<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function visit()
    {
      $views = DB::select('SELECT count(views), MONTHNAME(created_at) from `visits` WHERE post_id = 27 group by MONTHNAME(created_at)', ['id' => 27]);
      return $views;
    }
}
