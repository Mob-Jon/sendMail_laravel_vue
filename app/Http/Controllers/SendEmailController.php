<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sendEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'topic' => 'required | string |max: 25',
            'email' => 'required | email | string',
            'body' => 'required | string | max: 255'
        ]);
        $data = [
            'topic' => $request->topic,
            'email' => $request->email,
            'body' => $request->body
      ];
 
      try {
        Mail::send([], $data, function($message)use($data) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["topic"])
                    ->setBody($data["body"]);
                    
                    
        });
        return response()->json($data);
        echo"test";
        dd('Mail sent successfully');
      } catch (Exception $e) {
         return response()->json($e);
      }
       
    }
}
