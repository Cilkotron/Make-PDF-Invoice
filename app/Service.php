<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $filiable = ['title', 'description', 'price'];
}
