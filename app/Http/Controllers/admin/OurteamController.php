<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Ourteam;
use Image;

class OurteamController extends Controller
{
    public function Ourteam()
    {
        $ourteam = Ourteam::get();
        Session::flash('page', 'ourteam');
        return view('admin.ourteam.view_ourteam', compact('ourteam'));
    }

    public function addEditOurteam(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Ourteam";
            $button ="Submit";
            $ourteam = new Ourteam;
            $ourteamdata = array();
            $message = "Ourteam has been added sucessfully";
        }else{
            $title = "Edit Ourteam";
            $button ="Update";
            $ourteam = Ourteam::where('id',$id)->first();
            $ourteamdata= json_decode(json_encode($ourteam),true);
            $ourteam = Ourteam::find($id);
            $message = "Ourteam has been updated sucessfully";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            // if(empty($data['title'])){
            //     return redirect()->back()->with('error_message', 'Title is required !');
            // }
    
            if(empty($data['title']))
            {
                $data['title'] = "";
            }

            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/ourteam_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $ourteam->image =$imagePath;
    
                }
            }
            $ourteam->title = $data['title'];
            $ourteam->description = $data['description'];
            $ourteam->save();
            Session::flash('success_message', $message);
            return redirect('admin/ourteam');
        }

        Session::flash('page', 'ourteam');
        return view('admin.ourteam.add_edit_ourteam', compact('title','button','ourteamdata'));
    }

    public function deleteOurteamImage($id)
    {
      $ourteamimage = ourteam::select('image')->where('id',$id)->first();
      $imagePath = 'images/ourteam_images/';
      //delete ourteam image from folder if exists
      if(file_exists($imagePath.$ourteamimage->image)){
          unlink($imagePath.$ourteamimage->image);
      }
      //Delete ourteam image from ourteams table
      ourteam::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Ourteam has been deleted successfully!');

    }


    public function deleteourteam($id)
    {
      $id =ourteam::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Ourteam has been deleted successfully!');

    }
}
