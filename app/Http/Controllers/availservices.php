<?php

namespace App\Http\Controllers;

use \App\Models\Service;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;

class availservices extends Controller
{
    public function index()
    {
        // $service = Service::all();
        // $services =  auth()->user()->services()->get();
        // return view('layouts.main', ['services' => $services]);
    }
}
