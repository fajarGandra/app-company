<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Support\Carbon;

class Article extends Model implements Viewable
{
    use HasFactory, SoftDeletes, InteractsWithViews;

    protected $fillable = ['title', 'slug', 'category_id','admin_id', 'desc', 'cover', 'keywords', 'meta_desc', 'content'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->translatedFormat('l, d F Y');
    }
}
