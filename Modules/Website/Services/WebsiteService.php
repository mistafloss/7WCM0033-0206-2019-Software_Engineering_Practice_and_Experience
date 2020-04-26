<?php 

namespace Modules\Website\Services;

use Modules\Property\Entities\Property;
use Illuminate\Support\Facades\DB;

class WebsiteService
{
 public static function searchProperty($location, $intent)
 {
     
     if($intent == 'rent'){
         $property_status = 'To Let';
     }
     $properties =  DB::table('properties')
                    ->where('city', '=', $location)
                    ->orWhere('postcode', 'like', $location.'%')
                    ->where('status', '=', $property_status)
                    ->get();
     return $properties;
 }
}