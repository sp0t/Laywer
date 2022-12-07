<?php
   
namespace App\Http\Controllers;
   
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\CaseDocuments;

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
        $caseDocuments->case_id = 14;
        $caseDocuments->document_name = $imageName;
        $caseDocuments->save();

        return response()->json(['success'=>$imageName]);
    }
   
}