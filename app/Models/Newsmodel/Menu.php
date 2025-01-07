<?php

namespace App\Models\Newsmodel;

use App\Models\Newsmodel\Gallery;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $connection = 'mysql2';
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'menu_id', 'id')->orderBy('position', 'asc');
    }
    public function news()
    {
        return $this->hasMany(News::class, 'menu_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'code', 'code');
    }
}