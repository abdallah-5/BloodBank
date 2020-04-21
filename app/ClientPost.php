<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPost extends Model 
{

    protected $table = 'client_post';
    public $timestamps = true;
    protected $fillable = array('client_id', 'post_id');

}