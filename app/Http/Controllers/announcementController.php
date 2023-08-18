<?php

namespace App\Http\Controllers;

use App\Models\Annoucement;
use Illuminate\Http\Request;

class announcementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annoucement=Annoucement::all();
        return view('management',compact('annoucement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddAnnocement()
    {
        return view('add-annoucement');
        
    }

    
    public function saveAnnouncement(Request $request)
{
    
    $annoucementValue = $request->announcement;

    $annoucementValue = $request->announcement;

    $announcement = new Annoucement;
    $announcement->announcement = $annoucementValue;
    $announcement->save();

    return redirect('management')->with('success', 'announcement added successfully');
}


  
    public function editAnnoucement($id)
    {
        $annoucement=Annoucement::where('id','=',$id)->first();
        return view('edit-ann',compact('annoucement'));
    }

    
    public function updateAnnouncement(Request $request, $id)
{
    $newAnnouncement = $request->announcement; // Use the correct variable name for the announcement value

    Annoucement::where('id', '=', $id)->update([
        'announcement' => $newAnnouncement, // Use the correct column name in the update query
    ]);

    return redirect('management')->with('success', 'announcement updated successfully');
}


    /**
     * Update the specified resource in storage.
     */
    public function deleteAnnoucement($id)
    {
        Annoucement::where('id','=',$id)->delete();
        return redirect('management')->with('success','annoucement deleted succesfully');
    }
    
        //
    

   
  
}
