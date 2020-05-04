<?php

namespace Modules\BackOffice\Entities;

use Illuminate\Database\Eloquent\Model;


class PageContent extends Model
{
    protected $table = 'page_content';
    
    public function page()
    {
        return $this->belongsTo(Page::class,'page_id');
    }
}