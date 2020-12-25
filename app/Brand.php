<?php

namespace App;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Constants;
    public function getStatus(){
        return $this->getModelStatus($this->status);
    }

    protected $guarded =[];

    public function getImage(){
        return route("read_file" , encrypt("$this->brandImagesPath/$this->image"));
    }
}
