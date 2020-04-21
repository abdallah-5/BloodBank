<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_age', 'blood_type_id', 'bags_num', 'hospital_name', 'hospital_address', 'latitude', 'longitude', 'city_id', 'phone', 'notes', 'client_id');

    public function blood_type()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

}
