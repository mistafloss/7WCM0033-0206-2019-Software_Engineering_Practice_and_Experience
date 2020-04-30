<?php

namespace Modules\Website\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyAppointment extends Model
{
    protected $table = 'property_appointments';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'preferred_date', 'preferred_time', 'additional_information'];

}