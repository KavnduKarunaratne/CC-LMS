<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
  public function Material(){
    $material=Material::all();
    return view('material-list',compact('material'),[
        'materials' => (new Material())->all(),
        'subject'=>(new Subject())->all(),
    ]);
  }
  public function AddMaterial($subject_id){
    $user = Auth::user(); // Get the logged-in user (teacher)
    $subjects = $user->subjects; // Retrieve the subjects associated with the teacher
    $subject = Subject::find($subject_id);//to send the material under the selected subject
    $teacher =Auth::user();
    $assignedClass = $teacher->assignedClass;
    $assignedGrade = $teacher->grade;

    $classStudents = $assignedClass->students()->where('grade_id', $assignedGrade->id)->get();
    return view('add-material', compact('subjects','classStudents','subject_id','subject'));
  }

  public function saveMaterial(Request $request)
   {
    
    
    $request->validate([
        'material_name' => 'required',
        'file' => 'nullable|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        'description' => 'required',
        'link' => 'nullable',
        'subject_id' => 'required',
    ]);

    $filePath = $request->file('file')->store('materials', 'public');
    $subject_id = $request->input('subject_id'); 

 try{
       $material = new Material;
       $material->material_name = $request->material_name;
       $material->file = $filePath;
       $material->description = $request->description;
       $material->upload_date = now();
       $material->link = $request->link;
       $material->subject_id = $subject_id;
       $material->teacher_id = Auth::id();
       $material->save();

    
      if ($request->has('users')) {
        $material->users()->attach($request->input('users'));
       }

      return redirect()->back()->with('success', 'Material Added Successfully');
    }catch(\Exception $e){
      return redirect()->back()->with('error','An error occured');
    }
    }

    public function editMaterial($id){
        $material=Material::find($id);
        $teacher =Auth::user();
        $assignedClass = $teacher->assignedClass;
        $assignedGrade = $teacher->grade;
    
        $classStudents = $assignedClass->students()->where('grade_id', $assignedGrade->id)->get();
       

        return view('edit-material',compact('material','classStudents'),[
            'materials' => (new Material())->all(),
            'subjects'=>(new Subject())->all(),
        ]);
    }

    public function updateMaterial(Request $request, $id)
    {
 
  try{
         $request->validate([
        'material_name' => 'nullable',
        'description' => 'nullable',
        'link' => 'nullable',
        'file'=>'nullable|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800'
    ]);

    $material = Material::findOrFail($id); // Find the material by its ID

    // Update material details
    $material->material_name = $request->material_name;
    $material->description = $request->description;
    $material->link = $request->link;

    if ($request->hasFile('file')) {
        // Delete old file
        Storage::delete($material->file);
        // Store new file
        $filePath = $request->file('file')->store('materials', 'public');
        $material->file = $filePath;
       
    }

    $material->save(); 

   
    if ($request->has('users')) {
        $material->users()->sync($request->input('users')); // Use sync() to update the pivot table
    }

     return redirect()->back()->with('success', 'Material Updated Successfully');
    }catch(\Exception $e){
       return redirect()->back()->with('error','An error occured');
    }
    }

    public function deleteMaterial($id){

        Material::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Material Deleted Successfully');

    }


}
