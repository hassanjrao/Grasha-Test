<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function responses()
    {
        return $this->hasMany(UserResponse::class, "user_id");
    }

    public function calculateLearningStyle(){


        $totalIndependentResponses=$this->responses()->whereHas("question",function($query){
            $query->where("learning_style_id",1);
        })
        ->sum("possible_answer_id");

        $totalEvitativoResponses=$this->responses()->whereHas("question",function($query){
            $query->where("learning_style_id",2);
        })
        ->sum("possible_answer_id");

        $totalCollaborativeResponses=$this->responses()->whereHas("question",function($query){
            $query->where("learning_style_id",3);
        })
        ->sum("possible_answer_id");

        $totalDependienteResponses=$this->responses()->whereHas("question",function($query){
            $query->where("learning_style_id",4);
        })
        ->sum("possible_answer_id");

        $totalCompetitiveResponses=$this->responses()->whereHas("question",function($query){
            $query->where("learning_style_id",5);
        })
        ->sum("possible_answer_id");

        $totalParticipativeResponses=$this->responses()->whereHas("question",function($query){
            $query->where("learning_style_id",6);
        })
        ->sum("possible_answer_id");

        // average of all responses
        $average=($totalIndependentResponses+$totalEvitativoResponses+$totalCollaborativeResponses+$totalDependienteResponses+$totalCompetitiveResponses+$totalParticipativeResponses)/6;

        // determine which response is closest to the average

        $learningStyleId=1;

        $min=abs($totalIndependentResponses-$average);


        if(abs($totalEvitativoResponses-$average)<$min){
            $min=abs($totalEvitativoResponses-$average);
            $learningStyleId=2;
        }

        if(abs($totalCollaborativeResponses-$average)<$min){
            $min=abs($totalCollaborativeResponses-$average);
            $learningStyleId=3;
        }

        if(abs($totalDependienteResponses-$average)<$min){
            $min=abs($totalDependienteResponses-$average);

            $learningStyleId=4;
        }

        if(abs($totalCompetitiveResponses-$average)<$min){
            $min=abs($totalCompetitiveResponses-$average);
            $learningStyleId=5;
        }

        if(abs($totalParticipativeResponses-$average)<$min){
            $min=abs($totalParticipativeResponses-$average);
            $learningStyleId=6;
        }

        $learningStyle=LearningStyle::find($learningStyleId);


        return $learningStyle;

    }
}
