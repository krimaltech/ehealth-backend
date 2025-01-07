<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalReport extends Model
{
    use HasFactory;
    public function members()
    {
       return $this->belongsTo(Member::class,'member_id','id');
    }
   //  public function userpackage()
   //  {
   //     return $this->belongsTo(UserPackage::class,'userpackage_id','id');
   //  }
    public function screeningdate()
    {
       return $this->belongsTo(ScreeningDate::class,'screeningdate_id','id');
    }
   //  public function service()
   //  {
   //     return $this->belongsTo(Service::class);
   //  }
    public function labreports()
    {
       return $this->hasMany(PathologyReport::class,'report_id','id');
    }
    public function advice()
    {
       return $this->hasMany(DoctorScreeningAdvice::class,'report_id','id');
    }
    public function collectedby()
    {
       return $this->belongsTo(Employee::class,'collected_by','id');
    }
    public function lab()
    {
       return $this->belongsTo(Employee::class,'lab_id','id');
    }
    public function verifiedby()
    {
       return $this->belongsTo(Employee::class,'verified_by','id');
    }
    public function pdf()
    {
       return $this->hasOne(ScreeningReport::class,'report_id','id');
    }
    public function nosample()
    {
       return $this->hasOne(SampleNotCollected::class,'medicalreport_id','id')->where('additional_collection_status',0);
    }
    public function additionalnosample()
    {
       return $this->hasOne(SampleNotCollected::class,'medicalreport_id','id')->where('additional_collection_status',1);
    }
    public function sampleDrop()
    {
       return $this->hasOne(SampleDropTeam::class,'medicalreport_id','id');
    }

    public function skip(){
      return $this->hasMany(SkipTest::class,'report_id','id');
    }

    public function homeskip(){
      return $this->hasOne(SkipHomeVisit::class,'medicalreport_id','id');
    }

    public function online(){
      return $this->hasOne(OnlineDoctorConsultation::class,'medicalreport_id','id');
    }
}
