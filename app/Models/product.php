<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'brand_id',
        'size_id',
        'color_id',
        'image',
        'price',
        'price_new',
        'quantily',
        'content',
        
    ];
    public function category()
    {
    	return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function brand()
    {
    	return $this->belongsTo('App\Models\brand','brand_id','id');
    }
}
