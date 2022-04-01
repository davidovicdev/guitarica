<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\Mail\Mail as MailMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $mail = [
            'name' => $request->cname,
            'email' => $request->cemail,
            'message' => $request->cmessage,
            'title' => $request->ctitle
        ];

        Mail::to('matija.davidovic.115.18@ict.edu.rs')->send(new MailMain($mail));
        Mail::to($request->cemail)->send(new ConfirmMail($mail));

        return redirect()->route("contact.index")->with(["msg" => "Successfully sent email, please wait for our support team to respond"]);
    }
}
