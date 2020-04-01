<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_detail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'question', 'type', 'option', 'created_id',
    ];

    public function question_replie()
    {
        return $this->hasOne('App\Question_replie');
    }
}
