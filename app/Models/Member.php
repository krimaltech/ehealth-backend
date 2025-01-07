<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
      'member_id',
      'gd_id',
      'slug',
      'gender',
      'dob',
      'address',
      'member_type'
  ];
    public function member()
    {
       return $this->belongsTo(User::class,'member_id','id');
    }
    public function user()
    {
       return $this->belongsTo(User::class,'member_id','id');
    }

   //  public function family(){
   //    return $this->hasMany(Family::class, 'user_id')->where('approved',1);
   //  }

    public function kyc()
    {
       return $this->hasOne(KnowYourCustomer::class,'global_form_id','id');
    }

    public function school_profile()
    {
       return $this->belongsTo(CompanySchoolProfile::class,'id','member_id');
    }

    public function files(){
         return $this->hasOne(ImportFile::class,'member_id','id');
    }

    public function family(){
         return $this->hasOne(Family::class,'member_id','id');
    }

    public function school(){
         return $this->hasOne(SchooStudentEmail::class,'member_id','id');
    }
}
