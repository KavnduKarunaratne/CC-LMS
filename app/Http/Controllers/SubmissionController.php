<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function Submission()
    {
        $submission = Submission::all();
        return view('submissions', compact('submission'));
    }

    public function AddSubmission()
    {
        $user = Auth::user(); // Get the logged-in user (student)
        $materials = Material::all(); // Get all materials
        return view('add-submission', compact('materials'));
    }

    public function saveSubmission(Request $request)
    {
        $request->validate([
            'submission_name' => 'required',
            'description' => 'required',
            'submission_file' => 'nullable|file',
            'submission_link' => 'nullable',
            'material_id' => 'required',
            'student_id' => 'required',
        ]);

        $filePath = $request->file('submission_file')->store('submissions');

        $submission_name = $request->submission_name;
        $description = $request->description;
        $submission_link = $request->submission_link;
        $material_id = $request->material_id;
        $student_id = Auth::id(); // Use the logged-in student's ID

        $submission = new Submission;
        $submission->submission_name = $submission_name;
        $submission->uploaded_date = now();
        $submission->description = $description;
        $submission->submission_file = $filePath;
        $submission->submission_link = $submission_link;
        $submission->material_id = $material_id;
        $submission->student_id = $student_id;

        $submission->save();

        return redirect()->route('submissions')->with('success', 'Submission Added Successfully');
    }




    public function editSubmission($id)
    {
        $submission=Submission::where('id','=',$id)->first();
        return view('edit-submission',compact('submission'));
    }

    public function updateSubmission(Request $request, $id)
    {
        $request->validate([
            'submission_name'=> 'required',
            'description'=>'required',
            'submission_file'=>'nullable|file',
            'submission_link'=>'nullable',
            'material_id'=>'required',
            'student_id'=>'required',

        ]);

        $submission = Submission::findOrFail($id);
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete($submission->file);
            // Store new file
            $filePath = $request->file('file')->store('submissions');
            $submission->file = $filePath;
        }




        
        $newSubmissionName = $request->submission_name;
       
        $newDescription = $request->description;
       
       
      
        $newSubmissionLink = $request->submission_link;
     
        $newMaterialId = $request->material_id;
          $newStudentId = $request->student_id;
        


        // Use the correct variable name for the submission value
        $submission = Submission::where('id','=',$id)->update([

            'submission_name' => $newSubmissionName,
            'description' => $newDescription,
         
            'submission_link' => $newSubmissionLink,
            'material_id' => $newMaterialId,
            'student_id' => $newStudentId,
        ]);
        
        return redirect('submissions')->with('success', 'submission updated successfully');
    }

    public function deleteSubmission($id){
        Submission::where('id','=',$id)->delete();
        return redirect('submissions')->with('success','submission deleted succesfully');
    }
}
