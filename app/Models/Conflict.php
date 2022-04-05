<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    use HasFactory;

    public $timestamps =false;
    public function firstPoint()
    {
        return $this->belongsTo(Point::class, 'first_point_id', 'id');
    }


    public function secondPoint()
    {
        return $this->belongsTo(Point::class, 'second_point_id', 'id');
    }
    public function pattern()
    {
        return  $this->belongsTo(Pattern::class);
    }
    public function fabric()
    {
        return $this->belongsTo(Fabric::class, 'fabric_id');
    }

}
