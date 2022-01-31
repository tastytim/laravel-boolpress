<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class ContactController extends Controller
{
    public function store(Request $request){
        

        $dataMail = $request->all();
        Mail::to(env("MAIL_CONTACT_DESTINATION"))->send(new SendNewMail($dataMail));
        
    }
}
