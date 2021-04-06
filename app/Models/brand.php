<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory; 
    protected $table ='brands';
    protected $fillable = [
        'brandn_name',
        ];

        public function product()
        {
            return $this->hasMany("App\product","brand_id","id");
        }
}
