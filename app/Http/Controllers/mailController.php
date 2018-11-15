<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function send()
    {
    	mail::send(['text'=>'mail'], ['name', 'lugasanegah'], function($massage){
    		$massage->to('lanegah@gmail.com', 'to lugasanegah')->subject('email');
    		$massage->from('lanegah@gmail.com', 'lugasanegah');

    	});
    }
}
