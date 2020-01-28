<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Property;
use App\Town;
use App\State;
use App\Photo;
use App\Http\Requests\PropertyCreateRequest;
use App\Http\Requests\PropertyDeleteRequest;

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
      $towns = Town::all();
      $states = State::pluck('name', 'id')->all();
      $pets = config('app.pets');
      $washerdryer = config('app.washerDryer');
      $statesList = config('app.statesList');
      $newTownId = rand(1,99999);
      $newStateId = rand(1,99999);

      return view('admin.property.create', compact('towns', 'newTownId', 'states', 'newStateId', 'statesList', 'washerdryer', 'pets'));
    }

    public function store(PropertyCreateRequest $request)
    {
      $input = $request->all();

      if($request->input('state_new')) {
        $state = State::create([
          'id'    => $request->input('state_id'),
          'name'  => $request->input('state_new')
        ]);
      }

      if($request->input('town_new')) {
        $town = Town::create([
          'id'       => $request->input('town_id'),
          'name'     => $request->input('town_new'),
          'state_id' => $request->input('state_id')
        ]);
      }

      $newProp = Property::create($input);

      if($request->file('media')) {
        foreach($request->file('media') as $media) {
          $featured = false;
          if($request->input('featured') === $media->getClientOriginalName()) {
            $featured = true;
          }

          $name = time() . $media->getClientOriginalName();
          // $media->move('images', $name);


          $filePath = 'images/' . $name;
          Storage::disk('s3')->put($filePath, file_get_contents($media));



          $photo = Photo::create([
            'file'        => env('AWS_URL').'/'.$filePath,
            'property_id' => $newProp->id,
            'featured' => $featured
          ]);
        }
      }

      return redirect('/admin/property');
    }

    public function edit($id)
    {
      $property = Property::findOrFail($id);
      $states = State::pluck('name', 'id')->all();
      $towns = Town::pluck('name', 'id')->all();
      $towns = Town::all();
      $pets = config('app.pets');
      $washerdryer = config('app.washerDryer');
      $statesList = config('app.statesList');
      $newTownId = rand(1,99999);
      $newStateId = rand(1,99999);

      return view('admin.property.edit', compact('property', 'towns', 'newTownId', 'states', 'newStateId', 'statesList', 'washerdryer', 'pets'));
    }

    public function update(PropertyCreateRequest $request, $id)
    {
      $input = $request->all();
      if($request->input('state_new')) {
        $state = State::create([
          'id'    => $request->input('state_id'),
          'name'  => $request->input('state_new')
        ]);
      }

      if($request->input('town_new')) {
        $town = Town::create([
          'id'       => $request->input('town_id'),
          'name'     => $request->input('town_new'),
          'state_id' => $request->input('state_id')
        ]);
      }

      $newProp = Property::findOrFail($id);
      $featimg = $request->input('featured');

      if($featimg) {
        Photo::where('property_id', $id)
        ->where('featured', 1)
        ->update(['featured' => 0]);

        Photo::where('property_id', $id)
          ->where('file', $featimg)
          ->update(['featured'=> 1]);
      }

      if($request->file('media')) {
        foreach($request->file('media') as $media) {
          $featured = false;
          if($featimg === $media->getClientOriginalName()) {
            $featured = true;

            Photo::where('property_id', $id)
            ->where('featured', 1)
            ->update(['featured' => 0]);
          }

          $name = time() . $media->getClientOriginalName();

          $filePath = 'images/' . $name;
          Storage::disk('s3')->put($filePath, file_get_contents($media));



          $photo = Photo::create([
            'file'        => env('AWS_URL').'/'.$filePath,
            'property_id' => $newProp->id,
            'featured' => $featured
          ]);
        }
      }

      $photoDelete = $request->input('delete');

      if($photoDelete) {
        foreach($photoDelete as $photoId) {

          $photo = Photo::findOrFail($photoId);

          $photoFile = str_replace(env('AWS_URL').'/', '', $photo->file);

          Storage::disk('s3')->delete($photoFile);

          $photo->delete();
        }
      }

      Property::findOrFail($id)->update($request->all());

      Session::flash('message', 'property has been updated');

      return back();
    }

    public function destroy(PropertyDeleteRequest $request, $id)
    {
      $input = $request->all();
      $property = Property::findOrFail($id);
      $photos = $property->photos()->get();

      foreach($photos as $photo) {
        $photoFile = str_replace(env('AWS_URL').'/', '', $photo->file);

        Storage::disk('s3')->delete($photoFile);

        $photo->delete();
      }

      $property->delete();

      return redirect('/admin/property');
    }

    public function property($slug)
    {
      $property = Property::findBySlugOrFail($slug);
      $photos = $property->photos()->get();
      $town = $property->town()->get();

      return view('public.property.property', compact('property', 'photos', 'town'));
    }

    public function properties(Request $request)
    {
      $towns    = Town::all()->sortBy('state.name');
      $states   = State::all()->sortBy('name');
      $sortBy   = 'id';
      $orderBy  = 'desc';
      $perPage  = 20;
      $q        = null;
      $t        = $towns->pluck('id')->toArray();
      $s        = $states->pluck('id')->toArray();

      if($request->has('orderBy')) $orderBy = $request->query('orderBy');
      if($request->has('sortBy')) $sortBy = $request->query('sortBy');
      if($request->has('perPage')) $perPage = $request->query('perPage');
      if($request->has('q')) $q = $request->query('q');
      if($request->has('t')) $t = $request->get('t');
      if($request->has('s')) $s = $request->get('s');

      $properties = Property::search($q)
        ->whereIn('town_id', $t)
        ->WhereIn('state_id', $s)
        ->orderBy($sortBy, $orderBy)
        ->paginate($perPage);

      return view('public.property.properties', compact('properties', 'orderBy', 'sortBy', 'q', 'perPage', 'towns', 't', 'states', 's'));
    }
}
