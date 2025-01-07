<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OphthalmologistScreeningForm extends Model
{
    use HasFactory;
    protected $casts = [
        'advice' => 'array',
    ];

    public function doctor(){
        return $this->belongsTo(Employee::class,'doctor_id','id');
    }

    public function campaignuser(){
        return $this->belongsTo(CampaignUser::class,'campaign_user_id','id');
    }

    public function registercampaignuser(){
        return $this->belongsTo(RegisterCampaignUser::class,'register_campaign_user_id','id');
    }
}
