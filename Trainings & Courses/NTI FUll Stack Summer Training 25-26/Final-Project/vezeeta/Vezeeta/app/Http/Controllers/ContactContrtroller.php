<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactContrtroller extends Controller
{
    public function index()
{
    return view('contact');
}

}
