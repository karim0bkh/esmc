<?php

namespace App\Http\Controllers;

use App\Models\application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailApplication;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendEmail_accept($id): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $save = application::find($id);

        $email = $save->email;

        $mailData = [
            'title' => 'Application accepted',
            'body' => 'we are happy to enforme you that u have been accepted please send the needed documents. '
        ];

        Mail::to($email)->send(new EmailApplication($mailData));

        return redirect('/accepter')->with('completed', 'email has been sent');

    }
    public function sendEmail_refuser($id): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $save = application::find($id);

        $email = $save->email;

        $mailData = [
            'title' => 'Application rejected',
            'body' => 'we are sorry to informe you that your application has been rejected.'
        ];

        Mail::to($email)->send(new EmailApplication($mailData));

        return redirect('/refuser')->with('completed', 'email has been sent');

    }

}
