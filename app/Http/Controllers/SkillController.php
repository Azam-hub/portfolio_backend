<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    function index() {
        $skills = Skill::orderBy("order", 'desc')->where("is_deleted", "0")->get();
        return response()->json([
            "status" => true,
            "message" => "All skills",
            "data" => $skills,
        ]);
    }

    function create(Request $req) {
        
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "skill" => "required",
            "percentage" => "required",
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors(),
            ]);
        }
        
        $skill = Skill::create([
            "order" => $req->order,
            "skill" => $req->skill,
            "percentage" => $req->percentage,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Skill Created Successfully.",
            "skill" => $skill,
        ]);

    }

    function update(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "skill" => "required",
            "percentage" => "required",
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors(),
            ]);
        }

        $skill = Skill::find($id);

        $skill->update([
            "order" => $req->order,
            "skill" => $req->skill,
            "percentage" => $req->percentage,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Skill Updated Successfully.",
            "skill" => $skill,
        ]);
    }

    function destroy($id) {
        $skill = Skill::find($id);

        $skill->is_deleted = "1";

        $skill->save();

        return response()->json([
            "status" => true,
            "message" => "Skill successfully deleted.",
            "skill" => $skill,
        ]);
    }
}
