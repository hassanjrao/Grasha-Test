<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function possibleAnswer()
    {
        return $this->belongsTo(PossibleAnswer::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
