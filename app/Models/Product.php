<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'index',
        'description',
        'seo_title',
        'seo_description',

    ];

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }
    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }
    public function points()
    {
        return $this->belongsToMany(Point::class, 'product_point');
    }
}
