<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = [
        'family_id',
        'member_id',
        'approved',
        'primary_request',
        'payment_status',
    ];
    public function familyname()
    {
        return $this->belongsTo(FamilyName::class, 'family_id','id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function remove()
    {
        return $this->hasMany(RemoveFamilyRequest::class, 'member_id','member_id');
    }
    public function leave()
    {
        return $this->hasMany(MemberLeaveRequest::class, 'member_id','member_id');
    }
    // public function user_1()
    // {
    //     return $this->belongsTo(User::class, 'family_id');
    // }
    // public function user_2()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
