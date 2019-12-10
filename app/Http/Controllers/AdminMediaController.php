<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Property;


class AdminMediaController extends Controller
{
  public function index() {
    $photos = Photo::all();
    return view('media.index', compact('photos'));
  }

  public function show($id) {
    $property = Property::findOrFail($id);

    $photos = $property->photos;
    return view('media.show', compact('property', 'photos'));
  }
}
