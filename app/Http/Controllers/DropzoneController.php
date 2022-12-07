<?php
   
namespace App\Http\Controllers;
   
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\CaseDocuments;
use App\Models\CaseMilestone;
use Illuminate\Support\Facades\Auth;

class DropzoneController extends Controller
{
   
    /**
     * Generate Image upload View
     *
     * @return void
     */
    public function dropzone()
    {
        return view('dropzone-view');
    }
    
    /**
     * Image Upload Code
     *
     * @return void
     */
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $caseDocuments = new CaseDocuments();
        $caseDocuments->case_id =  $request->get('case_id_dcoument');
        $caseDocuments->document_name = $imageName;
        $caseDocuments->created_by    = Auth::user()->id;
        $caseDocuments->date          = date('Y-m-d');
        $caseDocuments->is_all_view   = 0;
        $caseDocuments->save();

        return response()->json(['success'=>$imageName]);
    }

    public function caseDocumentDelete(Request $request) {
        CaseDocuments::findOrFail($request->get('id'))->delete();

    }
   
    public function caseMilestoneDelete(Request $request) {
        CaseMilestone::findOrFail($request->get('id'))->delete();

    }

   
}