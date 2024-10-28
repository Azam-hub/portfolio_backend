<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QualificationController extends Controller
{

    function index() {
        $qualifications = Qualification::orderBy("order", 'desc')->where("is_deleted", "0")->get();
        return response()->json([
            "status" => true,
            "message" => "All qualifications",
            "data" => $qualifications,
        ]);
    }

    function create(Request $req) {
        // return $req;

        
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "qualification" => "required",
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
        
        $qualification = Qualification::create([
            "order" => $req->order,
            "qualification" => $req->qualification,
            "year" => $req->year,
            "description" => $req->description,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Qualification Created Successfully.",
            "qualification" => $qualification,
        ]);

    }

    function update(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            "order" => "required|numeric",
            "qualification" => "required",
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

        $qualification = Qualification::find($id);

        $qualification->update([
            "order" => $req->order,
            "qualification" => $req->qualification,
            "year" => $req->year,
            "description" => $req->description,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Qualification Updated Successfully.",
            "qualification" => $qualification,
        ]);
    }

    function destroy($id) {
        $qualification = Qualification::find($id);

        $qualification->is_deleted = "1";

        $qualification->save();

        return response()->json([
            "status" => true,
            "message" => "Qualification successfully deleted.",
            "qualification" => $qualification,
        ]);
    }
}
