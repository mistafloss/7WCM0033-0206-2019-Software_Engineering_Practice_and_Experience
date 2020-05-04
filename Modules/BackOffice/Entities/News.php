<?php

namespace Modules\BackOffice\Entities;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['slug', 'title', 'intro_text','image_file','image_url','content'];
  
}