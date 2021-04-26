<?php

namespace App;

use App\Traits\Constants;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Constants;
    public function getStatus()
    {
        return $this->getModelStatus($this->status);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }


    public function getReward()
    {
        if ($this->reward == 1) {
            $reward = "1st place";
        }
        if ($this->reward == 2) {
            $reward = "2nd place";
        }
        if ($this->reward == 3) {
            $reward = "3rd place";
        }
        return $reward ?? "";
    }

    protected $guarded = [];

    public function getImage()
    {
        return route("read_file", encrypt("$this->brandImagesPath/$this->image"));
    }

    public function brandReward()
    {
        return $this->hasOne(BrandRewardDesign::class, "brand_id");
    }

    public static function deleteWithImage(Brand $model, $deleteDesigns = true)
    {
        deleteFileFromPrivateStorage("$model->brandImagesPath/$model->image");
        if ($deleteDesigns && !empty($reward = $model->brandReward)) {
            BrandRewardDesign::deleteWithImage($reward);
        }
        $model->delete();
    }
}
