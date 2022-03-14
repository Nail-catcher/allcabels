<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title'
    ];

    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }
}
