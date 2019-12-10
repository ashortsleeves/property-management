<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Town;
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

      $states = array(
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
      return view('admin.property.create', compact('towns', 'newTownId', 'states'));
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

      $newProp = Property::create($input);

      if($request->file('media')) {
        foreach($request->file('media') as $media) {
          $name = time() . $media->getClientOriginalName();
          $media->move('images', $name);
          $photo = Photo::create([
            'file'        => $name,
            'property_id' => $newProp->id
          ]);
        }
      }

      return redirect('/admin/property');
    }
}
