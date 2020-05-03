<?php

namespace Modules\BackOffice\Entities;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    protected $table = 'page';
    
    public function content()
    {
        return $this->hasMany(PageContent::class);
    }
}