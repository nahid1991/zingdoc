<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EntityController extends Controller
{
    public function dashboard(){
    	return view('entity-admin-dashboard');
    }
}
