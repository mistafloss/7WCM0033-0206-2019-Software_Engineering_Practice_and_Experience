<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyTenancy extends Model
{
    protected $table = 'property_tenancies';
    protected $fillable = ['property_id', 'partner_id', 'start_date','end_date','status','deposit'];
    
}