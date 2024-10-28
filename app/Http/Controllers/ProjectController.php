<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\fileExists;

class ProjectController extends Controller
{

    function index() {
        $projects = Project::orderBy("order", 'desc')->where("is_deleted", "0")->get();
        return response()->json([
            "status" => true,
            "message" => "All projects",
            "data" => $projects,
        ]);
    }

    function create(Request $req) {
        
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "thumbnail" => "required|image|max:8000",
            "head" => "required",
            "link" => "required",
            "description" => "required",
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors(),
            ]);
        }

        $thumbnail = "";
        if (isset($req->thumbnail)) {
            // $thumbnail = $req->thumbnail->store('admin_thumbnails', 'public');

            $name = $req->thumbnail->hashName();
            $req->thumbnail->move(public_path('storage/project_thumbnails/'), $name);
            $thumbnail = "project_thumbnails/".$name;
        }
        
        $project = Project::create([
            "order" => $req->order,
            "thumbnail_path" => $thumbnail,
            "head" => $req->head,
            "github_link" => $req->link,
            "description" => $req->description,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Project Created Successfully.",
            "project" => $project,
        ]);

    }

    function update(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "thumbnail" => "image|max:8000",
            "head" => "required",
            "link" => "required",
            "description" => "required",
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors(),
            ]);
        }

        $project = Project::find($id);

        $project->order = $req->order;

        if (isset($req->thumbnail)) {

            $image_path = public_path('storage/' . $project->thumbnail_path);
            if (fileExists($image_path)) {
                @unlink($image_path);                
            }
            
            $name = $req->thumbnail->hashName();
            $req->thumbnail->move(public_path('storage/project_thumbnails/'), $name);
            $thumbnail = "project_thumbnails/".$name;

            $project->thumbnail_path = $thumbnail;
        }

        $project->head = $req->head;
        $project->github_link = $req->link;
        $project->description = $req->description;

        if ($project->save()) {
            return response()->json([
                "status" => true,
                "message" => "Project Updated Successfully.",
                "project" => $project,
            ]);
        }
    }

    function destroy($id) {
        $project = Project::find($id);

        $project->is_deleted = "1";

        $project->save();

        return response()->json([
            "status" => true,
            "message" => "Project successfully deleted.",
            "project" => $project,
        ]);
    }
}
