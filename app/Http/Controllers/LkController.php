<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;
class LkController extends Controller
{
    public function index(Request $request){
        return view('lk');
    }
}
