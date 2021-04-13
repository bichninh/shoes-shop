<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table ='order_details';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantily_sale',
        'price_unit',
        'size',
        'color',
       
    ];
}
