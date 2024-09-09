<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'addition_id',
        'title',
        'data',
        'price',
        'payment',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function addition()
    {
        return $this->belongsTo(Addition::class, 'addition_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }


}
