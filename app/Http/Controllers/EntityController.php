<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EntityController extends Controller
{
    // public function dashboard(){
    // 	return view('entity-admin-dashboard');
    // }

    public function appointments(){
    	return view('entity.entity-admin-appointments-view');
    }

    public function profile(){
    	return view('entity.entity-admin-view-profile');
    }

    public function profileEdit(){
    	return view('entity.entity-admin-edit-profile');
    }

    public function settings(){
    	return view('entity.entity-admin-account-setting');
    }
}
