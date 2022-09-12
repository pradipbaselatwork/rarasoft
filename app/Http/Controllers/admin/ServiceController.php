<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Service;
use Image;

class ServiceController extends Controller
{
    public function Service()
    {
        $service = Service::get();
        Session::flash('page', 'service');
        return view('admin.service.view_service', compact('service'));
    }

    public function addEditService(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Services";
            $button ="Submit";
            $service = new Service;
            $servicedata = array();
            $message = "Services has been added sucessfully";
        }else{
            $title = "Edit Services";
            $button ="Update";
            $service = Service::where('id',$id)->first();
            $servicedata= json_decode(json_encode($service),true);
            $service = Service::find($id);
            $message = "Services has been updated sucessfully";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['icon'])){
                return redirect()->back()->with('error_message', 'Icon is required !');
            }
    
            if(empty($data['title']))
            {
                $data['title'] = "";
            }
            // if(!empty($data['image'])){
            //     $image_tmp = $data['image'];
            //     // dd($image_tmp);
            //     if($image_tmp->isValid())
            //     {
            //         // get extension
            //         $extension = $image_tmp->getClientOriginalExtension();
            //         // generate new image name
            //         $imageName = rand(111,99999).'.'.$extension;
            //         $imagePath = 'images/service_images/'.$imageName;
            //         $result = Image::make($image_tmp)->save($imagePath);
            //         // dd($result);
            //         $service->image =$imagePath;
    
            //     }
            // }
         
            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            $service->icon = $data['icon'];
            $service->title = $data['title'];
            $service->description = $data['description'];
            $service->save();
            Session::flash('success_message', $message);
            return redirect('admin/service');
        }

        Session::flash('page', 'service');
        return view('admin.service.add_edit_service', compact('title','button','servicedata'));
    }

    // public function deleteServiceImage($id)
    // {
    //   $serviceimage = Service::select('image')->where('id',$id)->first();
    //   $imagePath = 'images/service_images/';
    //   //delete service image from folder if exists
    //   if(file_exists($imagePath.$serviceimage->image)){
    //       unlink($imagePath.$serviceimage->image);
    //   }
    //   //Delete service image from services table
    //   Service::where('id',$id)->update(['image'=>'']);
    //   return redirect()->back()->with('success_message', 'Service has been deleted successfully!');

    // }

    public function deleteService($id)
    {
      $id =Service::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Services has been deleted successfully!');

    }
}
