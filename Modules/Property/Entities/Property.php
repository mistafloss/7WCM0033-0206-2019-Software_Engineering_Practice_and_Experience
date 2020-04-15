<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class Property extends Model
{
    protected $table = 'properties';


    public function category()
    {
        return $this->belongsTo(PropertyCategory::class,'property_categories');
    }
  
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
