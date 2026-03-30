<?php

namespace App\Http\Controllers;

use App\Mail\ExampleMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view("index");
    }
 public function mailMe()
    {
        Mail::to('jose.ledo78@gmail.es')->send(new ExampleMail('Jose Ledo'));
        return view('sent');
    }
}
