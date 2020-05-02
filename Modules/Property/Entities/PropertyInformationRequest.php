<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyInformationRequest extends Model
{
    protected $table = 'property_information_requests';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'enquiry', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }

}