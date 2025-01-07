<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCampaignUser extends Model
{
    use HasFactory;

    public function campaign(){
        return $this->belongsTo(Campaign::class,'campaign_id','id');
    }

    public function campaignuser(){
        return $this->belongsTo(CampaignUser::class,'campaign_user_id','id');
    }

    public function nurse(){
        return $this->hasOne(NurseScreeningForm::class,'register_campaign_user_id','id');
    }

    public function doctor(){
        return $this->hasOne(DoctorScreeningForm::class,'register_campaign_user_id','id');
    }

    public function ophthalmologist(){
        return $this->hasOne(OphthalmologistScreeningForm::class,'register_campaign_user_id','id');
    }

    public function dentist(){
        return $this->hasOne(DentalScreeningForm::class,'register_campaign_user_id','id');
    }

    public function dietician(){
        return $this->hasOne(DieticianScreeningForm::class,'register_campaign_user_id','id');
    }

    public function physio(){
        return $this->hasOne(PhysiotherapistScreeningForm::class,'register_campaign_user_id','id');
    }
}
