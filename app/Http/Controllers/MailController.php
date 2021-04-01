<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){
       return view('mail/mailform');
    }

    public function sendmail(Request $request){

        $recipient = $request->recipient;
        $ovner = $request->ovner;
        $subject = $request->subject;

        $array = [
            'sender'=>$request->input('sender'),
            'subject'=>$request->input('subject'),
            'mail_content'=>$request->input('mail_content'),
        ];

        mail::send('mailview', $array, function ($message)use ($recipient,$ovner,$subject) {
            $message->from($ovner, 'İletişim');
            $message->subject($subject);
            $message->to($recipient);
        });

        return back()->with('status','Mail Başarılı bir şekide gönderildi');

    }
}
