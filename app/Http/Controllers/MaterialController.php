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
        $materials = Material::all();
        $subject=Subject::all();
        return view('material-list', compact('materials','subject'));
    }

    public function addMaterial($subject_id){
        $user = Auth::user(); // Get the logged-in user (teacher)
        $subjects = $user->subjects; // Retrieve the subjects associated with the teacher
        $subject = Subject::find($subject_id); // To send the material under the selected subject
        $teacher = Auth::user();
        $assignedClass = $teacher->assignedClass;
        $assignedGrade = $teacher->grade;

        $classStudents = $assignedClass->students()->where('grade_id', $assignedGrade->id)->get();

        $relatedSubjects = Subject::where('subject_name', $subject->subject_name)
        ->where('grade_id', $subject->grade_id)
        ->where('id', '!=', $subject->id) // Exclude the current subject
        ->get();
        return view('add-material', compact('subjects', 'classStudents', 'subject_id', 'subject','relatedSubjects'));
    }

    public function saveMaterial(Request $request){
        try {
            $request->validate([
                'material_name' => 'required',
                'file' => 'nullable|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
                'description' => 'required',
                'link' => 'nullable',
                'subject_id' => 'required',
                'subject_ids' => 'nullable|array', // Allow an array of related subject IDs
            ]);
    
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('materials', 'public');
            } else {
                $filePath = null;
            }
    
            // Save the material to the primary subject
            $material = new Material;
            $material->material_name = $request->material_name;
            $material->file = $filePath;
            $material->description = $request->description;
            $material->upload_date = now();
            $material->link = $request->link;
            $material->subject_id = $request->subject_id;
            $material->teacher_id = Auth::id();
            $material->save();
    
            // Save the material to related subjects if any are selected
            if ($request->has('subject_ids')) {
                $subject_ids = $request->input('subject_ids');
                foreach ($subject_ids as $subject_id) {
                    $relatedMaterial = new Material;
                    $relatedMaterial->material_name = $request->material_name;
                    $relatedMaterial->file = $filePath;
                    $relatedMaterial->description = $request->description;
                    $relatedMaterial->upload_date = now();
                    $relatedMaterial->link = $request->link;
                    $relatedMaterial->subject_id = $subject_id;
                    $relatedMaterial->teacher_id = Auth::id();
                    $relatedMaterial->save();
                }
            }
    
            if ($request->has('users')) {
                $material->users()->attach($request->input('users'));
            }
    
            return redirect()->back()->with('success', 'Material Added Successfully');
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while saving the material. Check file type.');
        }
    }
    
    public function editMaterial($subject_id, $id){
        $material = Material::find($id);
        $teacher = Auth::user();
    
        $assignedClass = $teacher->assignedClass;
        $assignedGrade = $teacher->grade;
    
        $classStudents = $assignedClass->students()->where('grade_id', $assignedGrade->id)->get();
    
        // Retrieve the subject based on subject_id
        $subject = Subject::find($subject_id);
    
        // Check if the material exists and has related subjects
        $relatedSubjects = Subject::where('subject_name', $subject->subject_name)
            ->where('grade_id', $subject->grade_id)
            ->where('id', '!=', $subject->id) // Exclude the current subject
            ->get();
    
        return view('edit-material', compact('material', 'classStudents', 'relatedSubjects', 'subject'));
    }
    
    

    public function updateMaterial(Request $request, $id){
        try {
            $request->validate([
                'material_name' => 'nullable',
                'description' => 'nullable',
                'link' => 'nullable',
                'file' => 'nullable|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
                'subject_id' => 'required',
                'subject_ids' => 'nullable|array',
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
            dd($filePath);
            // Detach all related subjects first
            $material->subjects()->detach();
    
            // Attach selected related subjects
            if ($request->has('subject_ids')) {
                $subject_ids = $request->input('subject_ids');
                $material->subjects()->attach($subject_ids);
            }
    
            // Update accessible users
            if ($request->has('users')) {
                $material->users()->sync($request->input('users'));
            }
        
            $material->save();
    
            return redirect()->back()->with('success', 'Material Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred');
        }
    }
    
    

    public function deleteMaterial($id){
        Material::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Material Deleted Successfully');
    }

    public function getRelatedSubjects($subjectName, $gradeId)
{
    $relatedSubjects = Subject::where('subject_name', $subjectName)
        ->where('grade_id', $gradeId)
        ->get();

    return response()->json($relatedSubjects);
}

 

}

