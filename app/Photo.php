<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = [
    'property_id',
    'file',
    'featured'
  ];

  // public function getFileAttribute($photo) {
  //   return $this->$photo;
  // }

  public function property(){
    return $this->belongsTo('App\Property');
  }
}
