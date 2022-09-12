<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Allbanner;
use Image;


class AllbannerController extends Controller
{
    public function Allbanner()
    {   
        $allbanner = Allbanner::get();
        Session::flash('page', 'allbanner');
        return view('admin.allbanner.view_allbanner', compact('allbanner'));
    }

    public function addEditAllbanner(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Allbanner";
            $button ="Submit";
            $allbanner = new Allbanner;
            $allbannerdata = array();
            $message = "Allbanner has been added sucessfully";
        }else{
            $title = "Edit Allbanner";
            $button ="Update";
            $allbanner = Allbanner::where('id',$id)->first();
            $allbannerdata= json_decode(json_encode($allbanner),true);
            $allbanner = Allbanner::find($id);
            $message = "Allbanner has been updated sucessfully";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            
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
                    $imagePath = 'images/allbanner_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $allbanner->image =$imagePath;
    
                }
            }

            if(!empty($data['image_1'])){
                $image_tmp = $data['image_1'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/allbanner_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $allbanner->image_1 =$imagePath;
    
                }
            }

            if(!empty($data['image_2'])){
                $image_tmp = $data['image_2'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/allbanner_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $allbanner->image_2 =$imagePath;
    
                }
            }

            if(!empty($data['image_3'])){
                $image_tmp = $data['image_3'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/allbanner_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $allbanner->image_3 =$imagePath;
    
                }
            }

            if(!empty($data['image_4'])){
                $image_tmp = $data['image_4'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/allbanner_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $allbanner->image_4 =$imagePath;
    
                }
            }

            $allbanner->title = $data['title'];
            $allbanner->save();
            Session::flash('success_message', $message);
            return redirect('admin/allbanner');
        }

        Session::flash('page', 'allbanner');
        return view('admin.allbanner.add_edit_allbanner', compact('title','button','allbannerdata'));
    }

    // public function deleteAllbannerImage($id)
    // {
    //   $allbannerimage = Allbanner::select('image')->where('id',$id)->first();
    //   $imagePath = 'images/allbanner_images/';
    //   //delete allbanner image from folder if exists
    //   if(file_exists($imagePath.$allbannerimage->image)){
    //       unlink($imagePath.$allbannerimage->image);
    //   }
    //   //Delete allbanner image from allbanners table
    //   Allbanner::where('id',$id)->update(['image'=>'']);
    //   return redirect()->back()->with('success_message', 'allbanner has been deleted successfully!');

    // }

    public function deleteAllbanner($id)
    {
      $id =Allbanner::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Allbanner has been deleted successfully!');

    }
}
