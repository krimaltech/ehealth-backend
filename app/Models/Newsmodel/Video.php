<?php

namespace App\Models\Newsmodel;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'videos';

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
}