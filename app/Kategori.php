<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }
}
