<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_replie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'question_detail_id', 'answer', 'answered_id', 'created_id',
    ];

    public function question_detail()
    {
        return $this->hasOne('App\Question_detail');
    }
}
