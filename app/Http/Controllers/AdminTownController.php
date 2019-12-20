<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Town;
use App\Property;
class AdminTownController extends Controller
{
    public function store(Request $request) {
      Town::create($request->all());
    }
}
