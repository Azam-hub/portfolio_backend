<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    function index() {
        $courses = Course::orderBy("order", 'desc')->where("is_deleted", "0")->get();
        return response()->json([
            "status" => true,
            "message" => "All courses",
            "data" => $courses,
        ]);
    }

    function create(Request $req) {
        
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "course" => "required",
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
        
        $course = Course::create([
            "order" => $req->order,
            "course" => $req->course,
            "year" => $req->year,
            "description" => $req->description,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Course Created Successfully.",
            "course" => $course,
        ]);

    }

    function update(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "course" => "required",
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

        $course = Course::find($id);

        $course->update([
            "order" => $req->order,
            "course" => $req->course,
            "year" => $req->year,
            "description" => $req->description,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Course Updated Successfully.",
            "course" => $course,
        ]);
    }

    function destroy($id) {
        $course = Course::find($id);

        $course->is_deleted = "1";

        $course->save();

        return response()->json([
            "status" => true,
            "message" => "Course successfully deleted.",
            "course" => $course,
        ]);
    }
}
