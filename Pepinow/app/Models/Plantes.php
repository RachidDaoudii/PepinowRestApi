<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantes extends Model
{
    use HasFactory;

    protected $fillable = ['name','scientific_name','family','genus','height','origin','quantity','category_id'];

    public function Categories(){
        return $this->belongsTo(Categories::class,'id');
    }
}
