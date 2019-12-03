<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
  protected $fillable = [
    'address',
    'town_id',
    'rent'
  ];

  public function town() {
    return $this->belongsTo('App\Town');
  }
}
