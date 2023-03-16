<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantes extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','image','prix','category_id','user_id'];

    public function Categories(){
        return $this->belongsTo(Categories::class,'id');
    }
}
