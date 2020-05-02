<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyEvaluation extends Model
{
    protected $table = 'property_evaluation_appointment';
    protected $fillable = ['first_name', 'last_name', 'phone', 'postcode', 'email', 'type_of_enquiry', 'preferred_date', 'preferred_time', 'additional_information'];
    
}