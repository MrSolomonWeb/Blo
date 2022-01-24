<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function send(Request $request)
    {
        if ($request->method()=='POST'){
$mtext=nl2br($request->input('text'));
$body=<<<EBODY
<p><b>Имя:</b>{$request->input('name')}</p>
<p><b>Email:</b>{$request->input('email')}</p>
<p><b>Текст</b>:<br>{$mtext}</p>
EBODY;


            Mail::to('andrewtudesko8@gmail.com')->send(new TestMail($body));
            $request->session()->flash('success','Сообщение отправлено');
            return redirect('/send');

        }

        return view('send');
    }

}
