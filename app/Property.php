<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Log;


class Property extends Model
{
  use Sluggable;
  use SluggableScopeHelpers;



  public function sluggable()
  {
      return [
          'slug' => [
              'source'   => 'address',
              'onUpdate' => true
          ]
      ];
  }

  protected $fillable = [
    'address',
    'town_id',
    'state_id',
    'rent',
    'bedrooms',
    'bathrooms',
    'pets',
    'washer_dryer',
  ];

  public function town() {
    return $this->belongsTo('App\Town');
  }

  public function state() {
    return $this->belongsTo('App\State');
  }

  public function photos() {
    return $this->hasMany('App\Photo');
  }

  public function featimg() {
    return $this->photos()->where('featured', '=', true)->firstOrFail();
  }

  public function scopeSearch($query, $q)
  {
    if ($q == null) return $query;
    // $towns = Town::where('name', 'LIKE', "%{$q}%")->pluck('id')->toArray();
    return $query
            ->where('address', 'LIKE', "%{$q}%");
            // ->orWhereIn('town_id', $towns)
            // ->orWhere('state', 'LIKE', "%{$q}%");
  }
}
