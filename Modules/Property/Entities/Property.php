<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class Property extends Model
{
   
    protected $table = 'properties';


    public function category()
    {
        return $this->belongsTo(PropertyCategory::class,'property_category_id');
    }
  
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function tenancies()
    {
        return $this->hasMany(PropertyTenancy::class);
    }
    
    public function sales()
    {
        return $this->hasMany(PropertySale::class);
    }

    public function appointments()
    {
        return $this->hasMany(PropertyAppointment::class);
    }

    public function informationRequest()
    {
        return $this->hasMany(PropertyInformationRequest::class);
    }
}
