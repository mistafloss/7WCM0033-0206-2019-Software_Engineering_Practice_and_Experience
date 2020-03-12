<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyCategory extends Model
{
    protected $table = 'property_categories';
    
    protected $fillable = [
        'name', 'description'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'properties');
    }
}
