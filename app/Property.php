<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
  protected $fillable = [
    'address',
    'town_id',
    'state_id',
    'state',
    'rent'
  ];

  public function town() {
    return $this->belongsTo('App\Town');
  }
}
