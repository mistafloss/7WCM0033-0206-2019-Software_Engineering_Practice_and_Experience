<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertySale extends Model
{
    use SoftDeletes;
    protected $table = 'property_sales';
    protected $fillable = ['property_id', 'buyer_id', 'seller_id','date_sold','status','amount'];
    protected $dates = ['deleted_at'];
    
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