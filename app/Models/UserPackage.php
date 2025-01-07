<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    public function package(){
        return $this->belongsTo(Package::class);
    }
    public function familyname(){
        return $this->belongsTo(FamilyName::class,'familyname_id','id');
    }
    public function payment(){
        return $this->hasMany(PackagePayment::class,'userpackage_id','id');
    }
    public function familyfee(){
        return $this->belongsTo(PackageFee::class,'family_id','id');
    }
    public function dates(){
        return $this->hasMany(ScreeningDate::class,'userpackage_id','id');
    }
    public function member(){
        return $this->belongsTo(Member::class,'member_id','id');
    }
    public function requests(){
        return $this->hasMany(RequestScreening::class,'userpackage_id','id');
    }
}
