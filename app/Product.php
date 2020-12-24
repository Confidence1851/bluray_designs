<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];

    public function pics(){
        $this->hasMany(Picture::class);
    }

    public function feats(){
        $this->hasMany(Feature::class);
    }
    public function specs(){
        $this->hasMany(Spec::class);
    }
    public function quans(){
        $this->hasMany(Quantity::class);
    }
    public function types(){
        $this->hasMany(Type::class);
    }
}
