<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    function index() {
        $experiences = Experience::orderBy("order", 'desc')->where("is_deleted", "0")->get();
        return response()->json([
            "status" => true,
            "message" => "All Experiences",
            "data" => $experiences,
        ]);
    }

    function create(Request $req) {
        
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "field" => "required",
            "year" => "required",
            "description" => "required",
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors(),
            ]);
        }
        
        $experience = Experience::create([
            "order" => $req->order,
            "field" => $req->field,
            "year" => $req->year,
            "description" => $req->description,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Experience Created Successfully.",
            "experience" => $experience,
        ]);

    }

    function update(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "field" => "required",
            "year" => "required",
            "description" => "required",
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors(),
            ]);
        }

        $experience = Experience::find($id);

        $experience->update([
            "order" => $req->order,
            "field" => $req->field,
            "year" => $req->year,
            "description" => $req->description,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Experience Updated Successfully.",
            "experience" => $experience,
        ]);
    }

    function destroy($id) {
        $experience = Experience::find($id);

        $experience->is_deleted = "1";

        $experience->save();

        return response()->json([
            "status" => true,
            "message" => "Experience successfully deleted.",
            "experience" => $experience,
        ]);
    }
}
