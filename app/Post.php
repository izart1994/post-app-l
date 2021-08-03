<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table
    protected $table = 'posts';
    //PrimaryKey
    public $primaryKey = 'id';
    //TimeStamp
    public $timeStamp = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
