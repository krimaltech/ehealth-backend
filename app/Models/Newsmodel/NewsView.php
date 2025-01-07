<?php

namespace App\Models\Newsmodel;

use Illuminate\Database\Eloquent\Model;

class NewsView extends Model
{
    protected $connection = 'mysql2';
    public function postView()
    {
        return $this->belongsTo(News::class);
    }

    public static function createViewLog($news)
    {
        $postViews = new NewsView();
        $postViews->news_id = $news->id;
        $postViews->slug = $news->slug;
        $postViews->url = request()->url();
        $postViews->session_id = request()->getSession()->getId();
        $postViews->user_id = (auth()->check()) ? auth()->id() : null;
        $postViews->ip = request()->ip();
        $postViews->agent = request()->header('User-Agent');
        $postViews->save();
    }
}