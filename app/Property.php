<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

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
    'state',
    'rent',
  ];

  public function town() {
    return $this->belongsTo('App\Town');
  }

  public function photos() {
    return $this->hasMany('App\Photo');
  }
}
