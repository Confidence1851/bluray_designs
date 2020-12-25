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

    public function getReward(){
        if($this->reward == 1){
            $reward = "1st place";
        }
        if($this->reward == 2){
            $reward = "2nd place";
        }
        if($this->reward == 3){
            $reward = "3rd place";
        }
        return $reward ?? "None";
    }

    protected $guarded =[];

    public function getImage(){
        return route("read_file" , encrypt("$this->brandImagesPath/$this->image"));
    }
}
