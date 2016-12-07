<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];



    public function question()
    {
        return $this->belongsTo(Question::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
}
