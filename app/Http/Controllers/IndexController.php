<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
	public function verIndex()
    {
    	return view('index.inicio');
    }
    public function adminIndex()
    {
    	return view('index.inicioadmin');
    }

}