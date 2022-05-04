<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;
    protected $fillable = ['name','gen_name'];

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }

    public function guides()
    {
        return $this->belongsToMany(Guide::class, 'pattern_guide')->withPivot(['index', 'unique']);
    }

    public function constants()
    {
        return $this->belongsToMany(Constant::class, 'pattern_constant')->withPivot('index');
    }
    public function conflicts()
    {
        return $this->belongsToMany(Conflict::class, 'pattern_conflict');
    }
    public function otherguides()
    {
        return $this->belongsToMany(OtherGuides::class, 'pattern_other_guides', 'pattern_id','other_guide_id');
    }
}
