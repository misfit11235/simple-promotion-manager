<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Promo;

class User extends Authenticatable
{
    public function promos() {
        return $this->belongsToMany(Promo::class)->withTimestamps()->withPivot('status');
    }
}
