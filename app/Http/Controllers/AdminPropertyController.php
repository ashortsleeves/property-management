<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Town;

class AdminPropertyController extends Controller
{
    public function index()
    {
      $properties = Property::all();

      return view('admin.property.index', compact('properties'));
    }

    public function create()
    {
      $towns = Town::pluck('name', 'id')->all();
      return view('admin.property.create', compact('towns'));
    }
}
