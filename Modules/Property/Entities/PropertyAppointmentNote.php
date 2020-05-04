<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyAppointmentNote extends Model
{
    protected $table = 'property_appointment_notes';
    protected $fillable = ['note','property_appointment_id'];

    public function propertyAppointment()
    {
        return $this->belongsTo(PropertyAppointment::class,'property_appointment_id');
    }
}