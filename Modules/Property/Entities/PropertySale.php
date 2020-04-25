<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;


class PropertySale extends Model
{
    protected $table = 'property_sales';
    protected $fillable = ['property_id', 'buyer_id', 'seller_id','date_sold','status','amount'];
    
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
    public function buyer()
    {
        return $this->belongsTo(\Modules\BackOffice\Entities\Partner::class,'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(\Modules\BackOffice\Entities\Partner::class,'seller_id');
    }
}