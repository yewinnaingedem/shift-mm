<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\toAdmin ;
class EmailController extends Controller
{
    public function index () 
    {
        Mail::to('yewinnang11605@gmail.com')->send(new toAdmin('lee'));
    }
}
