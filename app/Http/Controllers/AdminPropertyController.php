<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Town;
use App\Http\Requests\PropertyCreateRequest;

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
      $newTownId = rand(1,99999);
      return view('admin.property.create', compact('towns', 'newTownId'));
    }

    public function store(PropertyCreateRequest $request)
    {
      $input = $request->all();

      if($request->input('town_new')) {
        $town = Town::create([
          'id'    => $request->input('town_id'),
          'name'  => $request->input('town_new')
        ]);

      }
      Property::create($input);

      return redirect('/admin/property');
    }
}
