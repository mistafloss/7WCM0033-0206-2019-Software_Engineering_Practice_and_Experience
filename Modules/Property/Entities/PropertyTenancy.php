<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertyTenancy extends Model
{
    protected $table = 'property_tenancies';
    protected $fillable = ['property_id', 'partner_id', 'start_date','end_date','status','deposit'];
    
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
    public function partner()
    {
        return $this->belongsTo(\Modules\BackOffice\Entities\Partner::class,'partner_id');
    }
}