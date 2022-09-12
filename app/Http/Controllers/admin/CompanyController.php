<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Company;
use Image;


class CompanyController extends Controller
{
    public function Company()
    {
        $company = Company::get();
        Session::flash('page', 'company');
        return view('admin.company.view_company', compact('company'));
    }

    public function addEditCompany(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Company";
            $button ="Submit";
            $company = new Company;
            $companydata = array();
            $message = "Company has been added sucessfully";
        }else{
            $title = "Edit Company";
            $button ="Update";
            $company = Company::where('id',$id)->first();
            $companydata= json_decode(json_encode($company),true);
            $company = Company::find($id);
            $message = "Company has been updated sucessfully";
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
                    $imagePath = 'images/company_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $company->image =$imagePath;
    
                }
            }
            $company->title = $data['title'];
            $company->description = $data['description'];
            $company->save();
            Session::flash('success_message', $message);
            return redirect('admin/company');
        }

        Session::flash('page', 'company');
        return view('admin.company.add_edit_company', compact('title','button','companydata'));
    }

    public function deleteCompanyImage($id)
    {
      $companyimage = Company::select('image')->where('id',$id)->first();
      $imagePath = 'images/company_images/';
      //delete company image from folder if exists
      if(file_exists($imagePath.$companyimage->image)){
          unlink($imagePath.$companyimage->image);
      }
      //Delete company image from companys table
      Company::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Company has been deleted successfully!');

    }


    public function deleteCompany($id)
    {
      $id =Company::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Company has been deleted successfully!');

    }
}

