<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Project;
use Image;

class ProjectController extends Controller
{
    public function Project()
    {
        $project = Project::get();
        Session::flash('page', 'project');
        return view('admin.project.view_project', compact('project'));
    }

    public function addEditProject(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Project";
            $button ="Submit";
            $project = new Project;
            $projectdata = array();
            $message = "Project has been added sucessfully";
        }else{
            $title = "Edit Project";
            $button ="Update";
            $project = Project::where('id',$id)->first();
            $projectdata= json_decode(json_encode($project),true);
            $project = Project::find($id);
            $message = "Project has been updated sucessfully";
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
                    $imagePath = 'images/project_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $project->image =$imagePath;
    
                }
            }
            $project->title = $data['title'];
            $project->url = $data['url'];
            $project->save();
            Session::flash('success_message', $message);
            return redirect('admin/project');
        }

        Session::flash('page', 'project');
        return view('admin.project.add_edit_project', compact('title','button','projectdata'));
    }

    public function deleteProjectImage($id)
    {
      $projectimage = Project::select('image')->where('id',$id)->first();
      $imagePath = 'images/project_images/';
      //delete project image from folder if exists
      if(file_exists($imagePath.$projectimage->image)){
          unlink($imagePath.$projectimage->image);
      }
      //Delete project image from projects table
      Project::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Project has been deleted successfully!');

    }


    public function deleteProject($id)
    {
      $id =Project::where('id', $id)->delete();
      return redirect()->back()->with('success_message', 'Project has been deleted successfully!');

    }
}
