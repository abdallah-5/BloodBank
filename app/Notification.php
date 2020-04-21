<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $hidden = ['pivot'];
    protected $fillable = array('title', 'content', 'donation_request_id');

    public function request()
    {
        return $this->belongsTo('App\DonationRequest');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

}
