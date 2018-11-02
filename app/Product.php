<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function presentPrice()
    {
        //return money_format('$%i', $this->price / 100);
        return sprintf('$%01.2f', $this->price / 100); // replace money_format() function which doesn't exists on windows systems
    }

    public function scopeShuffleRand($query)
      {
          return $query->inRandomOrder()->take(4);
      }
}
