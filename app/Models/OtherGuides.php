<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherGuides extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];


    public function points()
    {
        return $this->hasMany(OtherGuidesPoints::class,'guide_id');
    }
}
