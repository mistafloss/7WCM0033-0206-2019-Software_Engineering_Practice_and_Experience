<?php 

namespace Modules\Website\Services;

use Modules\Property\Entities\Property;
use Illuminate\Support\Facades\DB;

class WebsiteService
{
 public static function indexSearchProperty($location, $intent)
 {
     
     if($intent == 'rent'){
         $property_status = 'To Let';
     }elseif($intent == 'buy'){
         $property_status = 'For Sale';
     }

     $properties =  DB::table('properties')
                    ->where('city', '=', $location)
                    ->orWhere('postcode', 'like', $location.'%')
                    ->where('status', '=', $property_status)
                    ->get();
     return $properties;
 }
 public static function getAllProperties()
 {
     return Property::all();
 }
}