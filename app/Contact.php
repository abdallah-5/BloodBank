<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'subject', 'message', 'client_id');

    public function clients()
    {
        return $this->belongsTo('App\Client');
    }

}