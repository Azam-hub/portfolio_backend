<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\fileExists;

class GeneralInfoController extends Controller
{

    function index() {
        $generalInfo = GeneralInfo::find(1);
        return response()->json([
            "status" => true,
            "message" => "General Info Data",
            "data" => $generalInfo,
        ]);
    }


    function update(Request $req) {
        // return $req;
        $validator = Validator::make($req->all(), [
            'email' => 'required',
            "phone_no" => "required",
            "whatsapp_no" => "required",
            "location" => "required",
            "facebook" => "required",
            "twitter" => "required",
            "instagram" => "required",
            "github" => "required",
            "linkedin" => "required",
            // 'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ]);
        }

        $generalInfo = GeneralInfo::findOrFail(1);

        if (isset($req->profile_pic)) {

            $image_path = public_path('storage/' . $generalInfo->profile_pic);
            if (fileExists($image_path)) {
                @unlink($image_path);                
            }
            
            $name = $req->profile_pic->hashName();
            $req->profile_pic->move(public_path('storage/profile_pic/'), $name);
            $profile_pic = "profile_pic/".$name;

            $generalInfo->profile_pic = $profile_pic;
        }

        $generalInfo->update([
            'email' => $req->email,
            "phone_no" => $req->phone_no,
            "whatsapp_no" => $req->whatsapp_no,
            "location" => $req->location,
            "facebook" => $req->facebook,
            "twitter" => $req->twitter,
            "instagram" => $req->instagram,
            "github" => $req->github,
            "linkedin" => $req->linkedin,
        ]);

        return response()->json([
            "status" => true,
            "message" => "General Info Updated.",
            "generalInfo" => $generalInfo
        ]);
        // return $req;

    }
}
