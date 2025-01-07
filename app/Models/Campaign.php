<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function employees(){
        return $this->hasMany(CampaignEmployee::class,'campaign_id','id');
    }

    public function switch(){
        return $this->hasMany(SwitchCampaignEmployee::class,'campaign_id','id');
    }

    public function registercampaign(){
        return $this->hasMany(RegisterCampaignUser::class,'campaign_id','id');
    }
}
