<?php

namespace App;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class BrandRewardDesign extends Model
{
    use Constants;
    protected $guarded = [];

    public function brand(){
        return $this->belongsTo(Brand::class , "brand_id");
    }

    public function getDesignPath(){
        return "$this->brandRewardDesignsPath/$this->design";
    }
}
