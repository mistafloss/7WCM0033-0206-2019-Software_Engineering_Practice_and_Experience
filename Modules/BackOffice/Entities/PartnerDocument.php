<?php

namespace Modules\BackOffice\Entities;

use Illuminate\Database\Eloquent\Model;


class PartnerDocument extends Model
{
    protected $table = 'partner_documents';
    protected $fillable = ['partner_id', 'document_title', 'document_file', 'document_url'];
    
    public function partner()
    {
        return $this->belongsTo(Partner::class,'partner_id');
    }
  
}