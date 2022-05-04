<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherGuidesPoints extends Model
{
    use HasFactory;
    protected $fillable = [
        'index',
        'description'
    ];
    public function guide()
    {
        return $this->belongsTo(OtherGuides::class,'guide_id');
    }
}
