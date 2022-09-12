<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Font;
use Image;

class FontController extends Controller
{
    public function Font()
    {
        $font = Font::get();
        Session::flash('page', 'font');
        return view('admin.font.view_font', compact('font'));
    }

    public function addEditFont(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Font Slide";
            $button ="Submit";
            $font = new Font;
            $fontdata = array();
            $message = "Font Slide has been added sucessfully";
        }else{
            $title = "Edit Font Slide";
            $button ="Update";
            $font = Font::where('id',$id)->first();
            $fontdata= json_decode(json_encode($font),true);
            $font = Font::find($id);
            $message = "Font Slide has been updated sucessfully";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['title'])){
                return redirect()->back()->with('error_message', 'Title is required !');
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
                    $imagePath = 'images/font_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $font->image =$imagePath;
    
                }
            }
            $font->title = $data['title'];
            $font->save();
            Session::flash('success_message', $message);
            return redirect('admin/font');
        }

        Session::flash('page', 'font');
        return view('admin.font.add_edit_font', compact('title','button','fontdata'));
    }

    public function deleteFontImage($id)
    {
      $fontimage = Font::select('image')->where('id',$id)->first();
      $imagePath = 'images/font_images/';
      //delete font image from folder if exists
      if(file_exists($imagePath.$fontimage->image)){
          unlink($imagePath.$fontimage->image);
      }
      //Delete font image from fonts table
      Font::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Font Slide has been deleted successfully!');

    }


    public function deleteFont($id)
    {
      $id =Font::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Font Slide has been deleted successfully!');

    }
}
