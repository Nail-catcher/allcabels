<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;










    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function guides()
    {
        return $this->hasMany(Guide::class);
    }
    public function patterns()
    {
        return $this->hasMany(Pattern::class);
    }

}
