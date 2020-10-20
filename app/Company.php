<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function bills() {
        return $this->hasMany('App\Bill');
    }
}
