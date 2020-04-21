<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'password', 'phone', 'email', 'dob', 'blood_type_id', 'last_donation_date', 'city_id', 'pin_code', 'is_activated' );

    public function blood()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function cities()
    {
        return $this->belongsTo('App\City');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function requests()
    {
        return $this->hasMany('App\DonationRequest');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Governorate');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function tokens()
    {
        return $this->hasMany('App\Token');
    }

    protected $hidden = [
        'password', 'api_token',
    ];

}
