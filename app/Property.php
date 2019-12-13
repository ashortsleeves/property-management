<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


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
    'state',
    'rent',
    'bedrooms',
    'bathrooms',
    'pets',
    'washer_dryer',
  ];

  public function town() {
    return $this->belongsTo('App\Town');
  }

  public function photos() {
    return $this->hasMany('App\Photo');
  }


  public function scopeSearch($query, $q)
  {
    if ($q == null) return $query;
    return $query
            ->where('address', 'LIKE', "%{$q}%")
            ->orWhere('rent', 'LIKE', "%{$q}%")
            ->orWhere('state', 'LIKE', "%{$q}%");
  }

}
