<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningStyle extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $append=["info"];

    public function getInfoAttribute()
    {
        return $this->{"info_".app()->getLocale()};
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }


}
