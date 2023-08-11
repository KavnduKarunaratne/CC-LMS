<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
  public function Material(){
    $material=Material::all();
    return view('material-list',compact('material'),[
        'materials' => (new Material())->all(),
    ]);
  }
  public function AddMaterial(){
    $user = Auth::user(); // Get the logged-in user (teacher)
    $subjects = $user->subjects; // Retrieve the subjects associated with the teacher

    return view('add-material', compact('subjects'));
  }
    public function saveMaterial(Request $request){
    
        $request->validate([
        'material_name'=> 'required',
        'file'=>'required',
        'description'=>'required',
       // 'upload_date'=>'required',
       
        'link'=>'null',
      
        'subject_id'=>'required',
        ]);

        $material_name=$request->material_name;
        $material_file=$request->file;
        $description=$request->description;
    
        $link=$request->link;
       
        $subject_id=$request->subject_id;
    
      
    
        $material = new Material;
        $material->material_name=$material_name;
        $material->file=$material_file;
        $material->description=$description;
          $material->upload_date = now();
        $material->link=$link;
     
        $material->subject_id=$subject_id;

        $material->teacher_id = Auth::id();

        $material->save();

        return redirect()->back()->with('success','Material Added Successfully');
    }

    public function editMaterial($id){
        $material=Material::find($id);
        return view('edit-material',compact('material'));
    }

    public function updateMaterial(Request $request,$id){

        $newMaterialName=$request->material_name;
        $newMaterialFile=$request->file;
        $newDescription=$request->description;
     
        $newLink=$request->link;
      
        $newSubjectId=$request->subject_id;

        Material::where('id',$id)->update([
            'material_name'=>$newMaterialName,
            'file'=>$newMaterialFile,
            'description'=>$newDescription,
         
            'link'=>$newLink,
            
            'subject_id'=>$newSubjectId,
        ]);

        return redirect()->back()->with('success','Material Updated Successfully');


    }
    public function deleteMaterial($id){

        Material::where('id',$id)->delete();
        return redirect()->back()->with('success','Material Deleted Successfully');

    }




}
