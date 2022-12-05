<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DataTables;

class BlogController extends Controller
{
    public function index()
    {
        $page_meta = [
            'page_title'        => 'Blog',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'blog'
        ];        
        return view('blog.index', compact('page_meta'));
    }

    public function load_ajax(Request $request) {
        $input = $request->input();        
        $blogs = Blog::select([ 'blogs.title', 'blogs.mysummernote', 'blogs.description', 'blogs.id','blogs.created_by', 'blogs.created_at', 'blogs.updated_at','blogs.updated_by',])
            
	

            ->orderBy('blogs.id');

        return Datatables::of($blogs)   
      
                      
                        ->editColumn('created_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->created_at));
                        })
                        ->editColumn('updated_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->updated_at));
                        })                            
                        ->addColumn('actions', function($obj) {
                            return '<div class="list-icons">
                            <a href="'.route('blog.view', [$obj->id]).'" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                            <a href="'.route('blog.edit', [$obj->id]).'" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                            <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a></div>';
                        })
                        ->rawColumns([ 'mysummernote','inactive', 'actions'])
                        ->make(TRUE);
    }

    public function create(){
        $page_meta = [
            'page_title'        => 'Create blog',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'blog'
        ];        

        return view('blog.add', compact('page_meta'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title'          => 'required',
            'mysummernote'       => 'required',
            'description'       => 'required',
            
         
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $user = Blog::create([
                'title'          => $input['title'],
                'mysummernote'       => $input['mysummernote'],
                'description'       => $input['description'],
                'status'        => 1,
                'created_by'    => Auth::user()->id,
                'updated_by'    => Auth::user()->id
            ]);

            return response()->json(['status' => TRUE, 'msg' => 'blog details added successfully.']);
        }
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);

        $page_meta = [
            'page_title'        => 'Edit blog',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'blog'
        ];        

        return view('blog.edit', compact('page_meta','blog'));  
  
    } 
    
    

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'title'          => 'required',
            'mysummernote'       => 'required',
            'description'       => 'required',
            
         
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $blog = Blog::findOrFail($id);
            $blog ->title           = $input['title'];
            $blog ->mysummernote        = $input['mysummernote'];
            $blog ->description        = $input['description'];
            $blog->status         = isset($input['inactive']) ? 0 : 1;
           

          
            try {
                DB::beginTransaction();
                $blog->save();
                DB::commit();
                \Session::flash('success', 'blog details updated successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'blog details updated successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        } 
    }

    public function view($id){
        $blog = Blog::findOrFail($id);

        $page_meta = [
            'page_title'        => 'View blog',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'blog'
        ];        

        return view('blog.view', compact('page_meta', 'blog'));
    }                
}
