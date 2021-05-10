<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;
    protected $table ='shippings';
    protected $fillable = [
        'shipping_name',
        'shipping_email',
        'shipping_notes',
        'shipping_phone',
        'shipping_address',
        
    ];
    protected $primaryKey = 'id';
}
