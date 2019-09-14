<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class savedquestionssc extends Model
{
    protected $table ='savedquestionsscs';
    protected $fillable = [
        'studentid',
        'questionid',
        'starred'
    ];
}
