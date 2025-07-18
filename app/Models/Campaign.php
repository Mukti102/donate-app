<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryCampaign;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{   
    use HasFactory;
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(CategoryCampaign::class,'category_campaign_id');
    }

    public function donaturs(){
        return $this->hasMany(Donatur::class,'campaign_id');
    }
}
