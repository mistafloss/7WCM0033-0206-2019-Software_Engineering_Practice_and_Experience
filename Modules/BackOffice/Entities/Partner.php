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
}
