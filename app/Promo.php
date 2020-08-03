<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Promo extends Model
{
    const PROMO_STATUS_NOT_ELIGIBLE = 0;
    const PROMO_STATUS_ELIGIBLE = 1;
    const PROMO_STATUS_OPTED_IN = 2;

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('status');
    }
}
