<?php

namespace Modules\BackOffice\Entities;

use Illuminate\Database\Eloquent\Model;


class PartnerCategory extends Model
{
    protected $table = 'partner_categories';
    
    protected $fillable = [
        'name', 
    ];

    public function partner()
    {
        return $this->hasMany(Partner::class, 'partners');
    }
}
