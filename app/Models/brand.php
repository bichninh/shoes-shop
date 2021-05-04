<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory; 
    public $timestamps= false;
    protected $table ='brands';
    protected $fillable = [
        'brand_name'
        ];
    protected $primaryKey = 'brand_id';
        public function product()
        {
            return $this->belongsTo("App\product","brand_id","id");
        }
}
