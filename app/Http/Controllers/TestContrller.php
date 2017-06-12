<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestContrller extends Controller
{
    public function index()
    {
        return view('Article.snow.snow');
    }
}
