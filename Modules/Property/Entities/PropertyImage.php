<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyImage extends Model
{
    protected $table = 'property_images';
    protected $fillable = ['property_id', 'property_file', 'image_url'];
    
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
  
}