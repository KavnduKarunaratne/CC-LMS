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
  public function AddMaterial(){
    $user = Auth::user(); // Get the logged-in user (teacher)
    $subjects = $user->subjects; // Retrieve the subjects associated with the teacher

    $teacherClass = Auth::user()->class;
    $classStudents = $teacherClass->students;
    return view('add-material', compact('subjects','classStudents'));
  }

  public function saveMaterial(Request $request)
{
    $request->validate([
        'material_name' => 'required',
        'file' => 'nullable|mimes:doc,pdf,docx,xls,xlsx,zip,ppt,pptx',
        'description' => 'required',
        'link' => 'nullable',
        'subject_id' => 'required',
    ]);

    $material = new Material;
    $material->material_name = $request->material_name;
    $material->file = $request->file;
    $material->description = $request->description;
    $material->upload_date = now();
    $material->link = $request->link;
    $material->subject_id = $request->subject_id;
    $material->teacher_id = Auth::id();
    $material->save();

    // Attach selected students to the material
    if ($request->has('users')) {
        $material->users()->attach($request->input('users'));
    }

    return redirect()->back()->with('success', 'Material Added Successfully');
}

    public function editMaterial($id){
        $material=Material::find($id);
        $teacherClass = Auth::user()->class;
        $classStudents = $teacherClass->students;


        return view('edit-material',compact('material','classStudents'),[
            'materials' => (new Material())->all(),
            'subjects'=>(new Subject())->all(),
        ]);
    }

    public function updateMaterial(Request $request, $id)
{
    $request->validate([
        'material_name' => 'required',
        'description' => 'required',
        'link' => 'nullable',
        'subject_id' => 'required',
    ]);

    $material = Material::findOrFail($id); // Find the material by its ID

    // Update material details
    $material->material_name = $request->material_name;
    $material->description = $request->description;
    $material->link = $request->link;
    $material->subject_id = $request->subject_id;

    
    if ($request->hasFile('file')) {
        // Delete old file
        Storage::delete($material->file);
        // Store new file
        $filePath = $request->file('file')->store('materials');
        $material->file = $filePath;
       
    }

    $material->save(); 

   
    if ($request->has('users')) {
        $material->users()->sync($request->input('users')); // Use sync() to update the pivot table
    }

    return redirect()->back()->with('success', 'Material Updated Successfully');
}

    public function deleteMaterial($id){

        Material::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Material Deleted Successfully');

    }




}
