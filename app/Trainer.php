<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function getRouteKeyName(){
      return 'slug';
    }
}
