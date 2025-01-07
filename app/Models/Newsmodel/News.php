<?php

namespace App\Models\Newsmodel;

use App\Models\Newsmodel\Gallery;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = 'mysql2';

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'code', 'code');
    }
    public function video()
    {
        return $this->hasMany(Video::class, 'news_id', 'id');
    }
    public function user()
    {
        return $this->setConnection('mysql')->belongsTo(User::class, 'user_id', 'id');
    }
    public function newsView()
    {
        return $this->hasMany(NewsView::class);
    }
    public function showPost()
    {
        if (auth()->id() == null) {
            return $this->newsView()
                ->where('ip', '=',  request()->ip())->exists();
        }

        return $this->newsView()
            ->where(function ($postViewsQuery) {
                $postViewsQuery
                    ->where('session_id', '=', request()->getSession()->getId())
                    ->orWhere('user_id', '=', (auth()->check()));
            })->exists();
    }
}