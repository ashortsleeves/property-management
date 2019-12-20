<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
      'id',
      'name',
      'state_id',
      'created_at',
      'updated_at'
    ];

    public function state() {
      return $this->belongsTo('App\State');
    }

    // public function properties() {
    //   return $this->hasMany('App\Property');
    // }
    public $incrementing = false;
}
