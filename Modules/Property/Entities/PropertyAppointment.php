<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyAppointment extends Model
{
    protected $table = 'property_appointments';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'preferred_date', 'preferred_time', 'additional_information', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }

    public function notes()
    {
        return $this->hasMany(PropertyAppointmentNote::class);
    }
}