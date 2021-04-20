<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\sendEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index(Request $request)
    {

        $data = [
            'topic' => $request->topic,
            'email' => $request->email,
            'body' => $request->body
      ];

      

      try {

        $request->validate([
            'topic' => 'required | string |max: 25',
            'email' => 'required | email | string |unique:users|ends_with:mlhuillier.com',
            'body' => 'required | string | max: 255'
        ]);

        Mail::send([], $data, function($message)use($data) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["topic"])
                    ->setBody($data["body"]);
   
        });
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
        
      } catch (ValidationException $e) {
         return response()->json([
             'errors' =>$e->errors(),
             'message' => 'Failed'
         ]);
         
      }
       
    }
}
