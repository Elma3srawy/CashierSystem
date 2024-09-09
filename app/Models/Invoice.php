<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;
    const DELETED_AT = 'restored_at';

    protected $fillable = [
        'client_id',
        'status',
        'return_date',
        'date_of_receipt',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class ,'invoice_id');
    }
    public function client()
    {
        return $this->belongsTo(client::class ,'client_id');
    }


}
