<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'name',
        'color',
        'model',
        'size',
        'image',
        'quantity',
        'title',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class , 'section_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class , 'product_id');
    }
}
