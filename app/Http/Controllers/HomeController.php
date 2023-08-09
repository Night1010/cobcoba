<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home(){
        $service = Http::get('http://localhost:3001/api/services')['data'];
        $product = Http::get('http://localhost:3001/api/products')['data'];
        return view('',compact('service','product'));
    }
}
