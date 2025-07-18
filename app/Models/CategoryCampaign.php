<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Campaign;
class CategoryCampaign extends Model
{
    protected $guarded = ['id'];

    public function campaigns(){
        return $this->hasMany(Campaign::class);
    }
}
