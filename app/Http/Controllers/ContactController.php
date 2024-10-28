<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    function index() {
        $contacts = Contact::orderBy("id", 'desc')->where("is_deleted", "0")->get();
        return response()->json([
            "status" => true,
            "message" => "All contacts",
            "data" => $contacts,
        ]);
    }

    function create(Request $req) {
        
        $validator = Validator::make($req->all(), [
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required",

        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Validation Error",
                "errors" => $validator->errors(),
            ]);
        }
        
        Contact::create([
            "name" => $req->name,
            "email" => $req->email,
            "subject" => $req->subject,
            "message" => $req->message,
        ]);

        return response()->json([
            "status" => true,
            "message" => "Submitted Successfully.",
        ]);

    }

    function destroy($id) {
        $contact = Contact::find($id);

        $contact->is_deleted = "1";

        $contact->save();

        return response()->json([
            "status" => true,
            "message" => "Contact successfully deleted.",
            "contact" => $contact,
        ]);
    }
}
