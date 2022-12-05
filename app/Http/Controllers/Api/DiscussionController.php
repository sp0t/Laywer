<?php

namespace App\Http\Controllers\APi;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Traits\APITokenTrait;
use App\Models\Customer;
use App\Models\User;
use App\Models\Discussion;
use App\Models\DiscussionClient;
use App\Models\DiscussionLawyer;
use App\Models\DiscussionMessage;
use App\Models\DiscussionMessageLog;
use Validator;

class DiscussionController extends Controller
{
    use APITokenTrait;

    protected function guard()
    {
        return Auth::guard('api');
    }    

    public function create_discussion(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required',
        ]); 

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();

            $discussion = new Discussion();
            $discussion->title          = $input['title'];
            $discussion->description    = $input['description'];
            $discussion->requested_by   = $user->id;
            $discussion->created_from   = 'M';
            $discussion->save();

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Discussion request created successfully.']);            
        }                       
    }

    public function list_discussion_requested(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $page = $request->input('page', 0);
        $limit = $request->input('limit', 10);
        $type = $request->input('type', 'all');
        $search_key = $request->input('q', null);

        if($user->user_type != 'C'){
            return api_error_response(API_REQUEST_SUCCESS, 'This function not availble for lawyers.');
        }

        $discussions = Discussion::select('id', 'title', 'description', 'status', 'created_at')
                        ->where('created_from', 'M')
                        ->where('requested_by', $user->id);

        if ($search_key) {
            $discussions = $discussions->where(function ($q) use ($search_key) {
                $q->where('id', 'LIKE', "%{$search_key}%");
                $q->orWhere('title', 'LIKE', "%{$search_key}%");
                $q->orWhere('description', 'LIKE', "%{$search_key}%");
            });
        }

        if(!is_null($type)){
            if($type == "pending"){
                $discussions = $discussions->where('status', 0);
            } else if ($type == "ongoing"){
                $discussions = $discussions->where('status', 1);
            } else if ($type == "rejected"){
                $discussions = $discussions->where('status', 2);
            } else if ($type == "closed"){
                $discussions = $discussions->where('status', 3);
            }
        }

        $discussions = $discussions->paginate($limit, $page);

        return api_success_response(API_REQUEST_SUCCESS, ['discussions' => $discussions]);                
    }

    public function get_discussion(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $discussion = Discussion::where(['requested_by' => $user->id, 'id' => $id])->first();
        if($discussion){

            if($discussion->status != 0){
                return api_error_response(API_REQUEST_SUCCESS, 'Discussion has been already verified, you cannot edit.');    
            } else {
               return api_success_response(API_REQUEST_SUCCESS, ['discussion' => $discussion]); 
            }

        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Discussion not found.');
        }
    }

    public function update_discussion(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required',
        ]);
        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();
            $discussion = Discussion::where(['requested_by' => $user->id, 'id' => $id])->first();
            if($discussion){                
                $discussion->title          = $input['title'];
                $discussion->description    = $input['description'];
                $discussion->save();

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Discussion request updated successfully.']);                
            } else {
                return api_error_response(API_REQUEST_SUCCESS, 'Discussion not found.');
            }
        }
    }

    public function delete_discussion(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $discussion = Discussion::where(['requested_by' => $user->id, 'id' => $id])->first();

        if($discussion){
            if($discussion->status == 0 || $discussion->status == 2){
                $discussion->delete();
                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Discussion removed successfully.']);
            } else {
                return api_error_response(API_REQUEST_SUCCESS, 'Discussion request already approved, cannot delete.');
            }
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Discussion not found.');
        }
    }

    public function send_message(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $validator = Validator::make($request->all(), [
            'type'          => 'required',
        ]); 

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();

            $discussion = Discussion::where('id', $id)->with('discussion_lawyers', 'discussion_clients')->first();

            if(!$discussion){
                return api_error_response(API_REQUEST_SUCCESS, 'Discussion not found.');
            }


            if($user->user_type == 'C'){
                $obj = DiscussionClient::where(['discussion_id' => $id, 'client_id' => $user->id, 'status' => 0])->first();
            } else {
                $obj = DiscussionLawyer::where(['discussion_id' => $id, 'lawyer_id' => $user->id, 'status' => 0])->first();
            }

            if(!$obj){
                return api_error_response(API_REQUEST_SUCCESS, 'You are not allowed for this discussion.');
            }

            $discussionmessage = new DiscussionMessage();
            $discussionmessage->discussion_id   = $id;
            $discussionmessage->sent_by         = $user->id;
            $discussionmessage->sent_by_type    = $user->user_type;
            $discussionmessage->type            = $input['type'];

            if($input['type'] == 't'){
                if(is_null($input['message']) || empty($input['message'])){
                    return api_error_response(API_REQUEST_SUCCESS, 'Message cannot be empty.');
                }
                $discussionmessage->message = $input['message'];
            } else {
                $discussionmessage->message = '/sb/test.jpg';
            }

            if(isset($input['reply_id']) && !is_null($input['reply_id'])){
                $discussionmessage->reply_to_id = $input['reply_id'];
            }

            $discussionmessage->save();

            foreach ($discussion->discussion_clients as $client) {
                if($client->status == 1){
                    continue;
                }
                $discussionmessagelog                   = new DiscussionMessageLog();
                $discussionmessagelog->discussion_id    = $id;
                $discussionmessagelog->message_id       = $discussionmessage->id;
                $discussionmessagelog->message_to_id    = $client->client_id;
                $discussionmessagelog->message_to_type  = 'C';
                if($client->client_id == $user->id){
                   $discussionmessagelog->status        = 1; 
                   $discussionmessagelog->read_at       = \Carbon\Carbon::now();
                }
                $discussionmessagelog->save();
            }

            foreach ($discussion->discussion_lawyers as $lawyer) {
                if($lawyer->status == 1){
                    continue;
                }                
                $discussionmessagelog                   = new DiscussionMessageLog();
                $discussionmessagelog->discussion_id    = $id;
                $discussionmessagelog->message_id       = $discussionmessage->id;
                $discussionmessagelog->message_to_id    = $lawyer->lawyer_id;
                $discussionmessagelog->message_to_type  = 'L';
                if($lawyer->lawyer_id == $user->id){
                   $discussionmessagelog->status        = 1; 
                   $discussionmessagelog->read_at       = \Carbon\Carbon::now();
                }                
                $discussionmessagelog->save();
            }            

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Message sent successfully.']);            
        } 

    }

    public function unsend_message(Request $request, $id, $mid){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }        

        $discussionmessagelog = DiscussionMessageLog::where(['discussion_id' => $id, 'message_id' => $mid, 'status' => 1])->first();

        if($discussionmessagelog){
            return api_error_response(API_REQUEST_SUCCESS, 'The message already has been seen, cannot delete now.');
        }

        $discussionmessage = DiscussionMessage::findOrFail($mid);
        if($discussionmessage->sent_by != $user->id){
            DiscussionMessageLog::where(['discussion_id' => $id, 'message_id' => $mid, 'message_to_id' => $user->id, 'message_to_type' => $user->user_type])->update(['status' => 2]);
        } else {
            $discussionmessage->status = 2;
            $discussionmessage->save();

            DiscussionMessageLog::where(['discussion_id' => $id, 'message_id' => $mid])->update(['status' => 2]);   
        }

        return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Message removed successfully.']);            
    }

    public function read_unread_message(Request $request, $id, $mid){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }        

        $discussionmessagelog = DiscussionMessageLog::where(['discussion_id' => $id, 'message_id' => $mid, 'message_to_id' => $user->id, 'message_to_type' => $user->user_type])->first();

        if(!$discussionmessagelog){
            return api_error_response(API_REQUEST_SUCCESS, 'The message not availble.');
        }

        if($discussionmessagelog->status == 0){
            $discussionmessagelog->status   = 1;
            $discussionmessagelog->read_at  = \Carbon\Carbon::now();
            $discussionmessagelog->save();
            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Message set to read.']);            
        } elseif ($discussionmessagelog->status == 1){
            $discussionmessagelog->status   = 0;
            $discussionmessagelog->read_at  = null;
            $discussionmessagelog->save();            
            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Message set to unread.']);            
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Message already deleted.');            
        }

    }

    public function get_discussion_messages(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $page = $request->input('page', 0);
        $limit = $request->input('limit', 10);
        $search_key = $request->input('q', null);

        if($user->user_type == 'C'){
        }
        $discussionmessage = DiscussionMessage::select('discussion_messages.id', 'discussion_messages.message', 'discussion_messages.type', 'discussion_messages.reply_to_id', 'discussion_messages.created_at', 'discussion_messages.sent_by', 'discussion_messages.sent_by_type', 'dml.read_at')->with(['reply_message'])
            ->join('discussion_message_logs as dml', 'discussion_messages.id', '=', 'dml.message_id')
            ->where(['discussion_messages.discussion_id' => $id, 'dml.message_to_id' => $user->id, 'dml.message_to_type' => $user->user_type])
            ->where('discussion_messages.status', '!=' , 2)
            ->where('dml.status', '!=' , 2)            
            ->orderBy('discussion_messages.created_at', 'desc');

        if ($search_key) {
            $discussions = $discussions->where('message', 'like', '%'.$search_key.'%');
        }

        $discussionmessage = $discussionmessage->paginate($limit, $page);
        foreach ($discussionmessage as $message) {
            if($message->sent_by_type == 'C'){
                $customer = Customer::findOrFail($message->sent_by);
                $message->sent_by = $customer->name;
            } else {
                $lawyer = User::findOrFail($message->sent_by);
                $message->sent_by = $lawyer->name;
            }
        }

        return api_success_response(API_REQUEST_SUCCESS, ['messages' => $discussionmessage]);
    }

    //temporary function, will be handled from the backend.
    public function update_discussion_status(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $validator = Validator::make($request->all(), [
            'status'          => 'required',
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }

        $input = $request->input();                 

        $discussion = Discussion::where(['id' => $id])->first();

        if($discussion){
            $discussion->status = $input['status'] == 'A' ? 1 : 2;
            $discussion->save();

            $customers = Customer::where('is_client', 1)->get();
            foreach ($customers as $customer) {
                $discussionclient = new DiscussionClient();
                $discussionclient->discussion_id    = $discussion->id;
                $discussionclient->client_id        = $customer->id;
                $discussionclient->added_by         = 1;
                $discussionclient->save();
            }

            $users = User::get();
            foreach ($users as $user) {
                $discussionlawyer = new DiscussionLawyer();
                $discussionlawyer->discussion_id    = $discussion->id;
                $discussionlawyer->lawyer_id        = $user->id;
                $discussionlawyer->added_by         = 1;
                $discussionlawyer->save();
            }            

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Discussion updated successfully.']);
            
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Discussion not found.');
        }

    }
}
