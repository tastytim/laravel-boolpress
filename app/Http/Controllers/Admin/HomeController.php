<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// $user = Auth::user();
// $id = Auth::id();
class HomeController extends Controller
{
    //
    function index(){
       return view('/admin.home');
    }

}
