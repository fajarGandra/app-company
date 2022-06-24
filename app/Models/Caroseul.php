<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caroseul extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description','btn_name', 'btn_link','image','item_order','start_date','end_date', 'item_order', 'text_color'];
    
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at')
        ;
    }
}
