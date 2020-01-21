<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Town;
use App\State;
use App\Photo;
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
      $towns = Town::all();

      $states = State::pluck('name', 'id')->all();

      $pets = array(
        'dogs negotiable' => 'dogs negotiable',
        'cats negotiable' => 'cats negotiable',
        'pets negotiable' => 'pets negotiable',
        'not allowed'     => 'not allowed'
      );

      $washerdryer = array(
        'coin-op'          => 'coin-op',
        'hook-ups'         => 'hook-ups',
        'machines in unit' => 'machines in unit',
        'none'             => 'none'
      );

      $statesList = array(
        'Alabama' => 'Alabama',
        'Alaska' => 'Alaska',
        'American Samoa' => 'American Samoa',
        'Arizona' => 'Arizona',
        'Arkansas' => 'Arkansas',
        'California' =>'California',
        'Colorado'=>'Colorado',
        'Connecticut'=>'Connecticut',
        'Delaware'=>'Delaware',
        'District of Columbia'=>'District of Columbia',
        'Florida'=>'Florida',
        'Georgia'=>'Georgia',
        'Guam'=>'Guam',
        'Hawaii'=>'Hawaii',
        'Idaho'=>'Idaho',
        'Illinois'=>'Illinois',
        'Indiana'=>'Indiana',
        'Iowa'=>'Iowa',
        'Kansas'=>'Kansas',
        'Kentucky'=>'Kentucky',
        'Louisiana'=>'Louisiana',
        'Maine'=>'Maine',
        'Maryland'=>'Maryland',
        'Massachusetts'=>'Massachusetts',
        'Michigan'=>'Michigan',
        'Minnesota'=>'Minnesota',
        'Minor Outlying Islands'=>'Minor Outlying Islands',
        'Mississippi'=>'Mississippi',
        'Missouri'=>'Missouri',
        'Montana'=>'Montana',
        'Nebraska'=>'Nebraska',
        'Nevada'=>'Nevada',
        'New Hampshire'=>'New Hampshire',
        'New Jersey'=>'New Jersey',
        'New Mexico'=>'New Mexico',
        'New York'=>'New York',
        'North Carolina'=>'North Carolina',
        'North Dakota'=>'North Dakota',
        'Northern Mariana Islands'=>'Northern Mariana Islands',
        'Ohio'=>'Ohio',
        'Oklahoma'=>'Oklahoma',
        'Oregon'=>'Oregon',
        'Pennsylvania'=>'Pennsylvania',
        'Puerto Rico'=>'Puerto Rico',
        'Rhode Island'=>'Rhode Island',
        'South Carolina'=>'South Carolina',
        'South Dakota'=>'South Dakota',
        'Tennessee'=>'Tennessee',
        'Texas'=>'Texas',
        'U.S. Virgin Islands'=>'U.S. Virgin Islands',
        'Utah'=>'Utah',
        'Vermont'=>'Vermont',
        'Virginia'=>'Virginia',
        'Washington'=>'Washington',
        'West Virginia'=>'West Virginia',
        'Wisconsin'=>'Wisconsin',
        'Wyoming'=>'Wyoming'
      );

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
          $media->move('images', $name);
          $photo = Photo::create([
            'file'        => $name,
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
      $pets = array(
        'dogs negotiable' => 'dogs negotiable',
        'cats negotiable' => 'cats negotiable',
        'pets negotiable' => 'pets negotiable',
        'not allowed'     => 'not allowed'
      );

      $washerdryer = array(
        'coin-op'          => 'coin-op',
        'hook-ups'         => 'hook-ups',
        'machines in unit' => 'machines in unit',
        'none'             => 'none'
      );

      $statesList = array(
        'Alabama' => 'Alabama',
        'Alaska' => 'Alaska',
        'American Samoa' => 'American Samoa',
        'Arizona' => 'Arizona',
        'Arkansas' => 'Arkansas',
        'California' =>'California',
        'Colorado'=>'Colorado',
        'Connecticut'=>'Connecticut',
        'Delaware'=>'Delaware',
        'District of Columbia'=>'District of Columbia',
        'Florida'=>'Florida',
        'Georgia'=>'Georgia',
        'Guam'=>'Guam',
        'Hawaii'=>'Hawaii',
        'Idaho'=>'Idaho',
        'Illinois'=>'Illinois',
        'Indiana'=>'Indiana',
        'Iowa'=>'Iowa',
        'Kansas'=>'Kansas',
        'Kentucky'=>'Kentucky',
        'Louisiana'=>'Louisiana',
        'Maine'=>'Maine',
        'Maryland'=>'Maryland',
        'Massachusetts'=>'Massachusetts',
        'Michigan'=>'Michigan',
        'Minnesota'=>'Minnesota',
        'Minor Outlying Islands'=>'Minor Outlying Islands',
        'Mississippi'=>'Mississippi',
        'Missouri'=>'Missouri',
        'Montana'=>'Montana',
        'Nebraska'=>'Nebraska',
        'Nevada'=>'Nevada',
        'New Hampshire'=>'New Hampshire',
        'New Jersey'=>'New Jersey',
        'New Mexico'=>'New Mexico',
        'New York'=>'New York',
        'North Carolina'=>'North Carolina',
        'North Dakota'=>'North Dakota',
        'Northern Mariana Islands'=>'Northern Mariana Islands',
        'Ohio'=>'Ohio',
        'Oklahoma'=>'Oklahoma',
        'Oregon'=>'Oregon',
        'Pennsylvania'=>'Pennsylvania',
        'Puerto Rico'=>'Puerto Rico',
        'Rhode Island'=>'Rhode Island',
        'South Carolina'=>'South Carolina',
        'South Dakota'=>'South Dakota',
        'Tennessee'=>'Tennessee',
        'Texas'=>'Texas',
        'U.S. Virgin Islands'=>'U.S. Virgin Islands',
        'Utah'=>'Utah',
        'Vermont'=>'Vermont',
        'Virginia'=>'Virginia',
        'Washington'=>'Washington',
        'West Virginia'=>'West Virginia',
        'Wisconsin'=>'Wisconsin',
        'Wyoming'=>'Wyoming'
      );

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
          $media->move('images', $name);

          $photo = Photo::create([
            'file'        => $name,
            'property_id' => $newProp->id,
            'featured' => $featured
          ]);
        }
      }




      Property::findOrFail($id)->update($request->all());

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
