<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = [
        'product_id',
        'product_name',
        'category_id',
        'brand_id',
        'size_id',
        'color_id',
        'image',
        'price',
        
        'quantily',
        'content',
        
    ];
    protected $primaryKey = 'product_id';
    public function category()
    {
    	return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function brand()
    {
    	return $this->hasmany('App\Models\brand','brand_id','brand_id');
    }
}
