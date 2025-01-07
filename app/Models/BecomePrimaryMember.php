<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecomePrimaryMember extends Model
{
    use HasFactory;

    public function primary()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function newprimary()
    {
        return $this->belongsTo(Member::class, 'newmember_id');
    }
    public function familyname()
    {
        return $this->belongsTo(FamilyName::class, 'family_id');
    }
}
