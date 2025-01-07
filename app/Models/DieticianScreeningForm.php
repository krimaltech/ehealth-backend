<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DieticianScreeningForm extends Model
{
    use HasFactory;

    public function doctor(){
        return $this->belongsTo(Employee::class,'doctor_id','id');
    }

    public function campaignuser(){
        return $this->belongsTo(CampaignUser::class,'campaign_user_id','id');
    }
}
