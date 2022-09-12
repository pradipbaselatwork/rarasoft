<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Profession;
use Image;

class ProfessionController extends Controller
{
    public function Profession()
    {
        $profession = Profession::get();
        Session::flash('page', 'profession');
        return view('admin.profession.view_profession', compact('profession'));
    }

    public function addEditProfession(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Professional Help";
            $button ="Submit";
            $profession = new Profession;
            $professiondata = array();
            $message = "Professional help has been added sucessfully";
        }else{
            $title = "Edit Professional Help";
            $button ="Update";
            $profession = Profession::where('id',$id)->first();
            $professiondata= json_decode(json_encode($profession),true);
            $profession = Profession::find($id);
            $message = "Professional help has been updated sucessfully";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            // if(empty($data['Name'])){
            //     return redirect()->back()->with('error_message', 'Name is required !');
            // }
    
            if(empty($data['price']))
            {
                $data['price'] = "";
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
                    $imagePath = 'images/profession_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $profession->image =$imagePath;
    
                }
            }
            $profession->name = $data['name'];
            $profession->price = $data['price'];
            $profession->save();
            Session::flash('success_message', $message);
            return redirect('admin/profession');
        }

        Session::flash('page', 'profession');
        return view('admin.profession.add_edit_profession', compact('title','button','professiondata'));
    }

    public function deleteProfessionImage($id)
    {
      $professionimage = Profession::select('image')->where('id',$id)->first();
      $imagePath = 'images/profession_images/';
      //delete profession image from folder if exists
      if(file_exists($imagePath.$professionimage->image)){
          unlink($imagePath.$professionimage->image);
      }
      //Delete profession image from professions table
      Profession::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Professional help has been deleted successfully!');

    }


    public function deleteProfession($id)
    {
      $id =Profession::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Professional help has been deleted successfully!');

    }
}
