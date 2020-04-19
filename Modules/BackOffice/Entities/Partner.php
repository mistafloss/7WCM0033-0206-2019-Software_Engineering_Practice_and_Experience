<?php

namespace Modules\BackOffice\Entities;

use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    protected $table = 'partners';


    public function category()
    {
        return $this->belongsTo(PartnerCategory::class,'partner_category_id');
    }
  
    public function documents()
    {
        return $this->hasMany(PartnerDocument::class);
    }

    public function getProofOfIdentity()
    {
        return $this->documents->where('document_title', 'Proof of Identity')->first();
    }

    public function getProofOfAddress()
    {
        return $this->documents->where('document_title', 'Proof of Address')->first();
    }

    public function tenants()
    {
        return $this->where('partner_id',3)->get();
    }

    public function tenancies()
    {
        return $this->belongsToMany(\Modules\Property\Entities\PropertyTenancy::class, 'property_tenancies');
    }
}
