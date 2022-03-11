<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
    ];
    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }
    public function conflicts()
    {
        return $this->hasMany(Conflict::class);
    }
}
