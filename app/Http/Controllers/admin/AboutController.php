<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\About;
use Image;

class AboutController extends Controller
{
    public function About()
    {
        $about = About::get();
        Session::flash('page', 'about');
        return view('admin.about.view_about', compact('about'));
    }

    public function addEditAbout(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add About";
            $button ="Submit";
            $about = new About;
            $aboutdata = array();
            $message = "About has been added sucessfully";
        }else{
            $title = "Edit About";
            $button ="Update";
            $about = About::where('id',$id)->first();
            $aboutdata= json_decode(json_encode($about),true);
            $about = About::find($id);
            $message = "About has been updated sucessfully";
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
                    $imagePath = 'images/about_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $about->image =$imagePath;
    
                }
            }
            $about->title = $data['title'];
            $about->description = $data['description'];
            $about->save();
            Session::flash('success_message', $message);
            return redirect('admin/about');
        }

        Session::flash('page', 'about');
        return view('admin.about.add_edit_about', compact('title','button','aboutdata'));
    }

    public function deleteAboutImage($id)
    {
      $aboutimage = About::select('image')->where('id',$id)->first();
      $imagePath = 'images/about_images/';
      //delete about image from folder if exists
      if(file_exists($imagePath.$aboutimage->image)){
          unlink($imagePath.$aboutimage->image);
      }
      //Delete about image from abouts table
      About::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'About has been deleted successfully!');

    }


    public function deleteAbout($id)
    {
      $id =About::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'About has been deleted successfully!');

    }
}