<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUser extends Model
{
    use HasFactory;
    
    public function parent(){
        return $this->belongsTo(CampaignUser::class,'parent_id','id');
    }
}
