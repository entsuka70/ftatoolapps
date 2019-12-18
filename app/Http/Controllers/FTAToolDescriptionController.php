<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FTAToolDescriptionController extends Controller
{
    public function index()
    {
      return view('FTATool.ftatool_description');
    }

}
