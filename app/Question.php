<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];


    
    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
