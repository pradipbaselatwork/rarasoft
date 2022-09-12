<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Business;
use Image;

class BusinessController extends Controller
{
    public function Business()
    {
        $business = Business::get();
        Session::flash('page', 'business');
        return view('admin.business.view_business', compact('business'));
    }

    public function addEditBusiness(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Business Idea";
            $button ="Submit";
            $business = new Business;
            $businessdata = array();
            $message = "Business idea has been added sucessfully";
        }else{
            $title = "Edit Business Idea";
            $button ="Update";
            $business = Business::where('id',$id)->first();
            $businessdata= json_decode(json_encode($business),true);
            $business = Business::find($id);
            $message = "Business idea has been updated sucessfully";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['title'])){
                return redirect()->back()->with('error_message', 'Title is required !');
            }
    
            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            $business->title = $data['title'];
            $business->description = $data['description'];
            $business->save();
            Session::flash('success_message', $message);
            return redirect('admin/business');
        }

        Session::flash('page', 'business');
        return view('admin.business.add_edit_business', compact('title','button','businessdata'));
    }

    public function deleteBusiness($id)
    {
      $id =Business::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Business idea has been deleted successfully!');

    }
}

