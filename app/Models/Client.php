<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];
    public function invoice()
    {
        return $this->hasOne(Invoice::class ,'client_id');
    }
}
