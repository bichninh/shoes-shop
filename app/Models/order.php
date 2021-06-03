<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable = [
        'order_id',
        'order_name',
        'user_id',
        'order_date',
        'total',
        'status',
       
    ];
    protected $primaryKey = 'order_id';
    
}
