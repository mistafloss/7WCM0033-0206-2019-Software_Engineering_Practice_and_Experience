<?php 

namespace Modules\Website\Services;

use Modules\Property\Entities\Property;
use Illuminate\Support\Facades\DB;

class WebsiteService
{
 public static function searchProperty($location, $intent, $bedrooms, $type)
 {
    
     if($intent == 'rent'){
         $property_status = 'To Let';
     }elseif($intent == 'buy'){
         $property_status = 'For Sale';
     }
     
     if($bedrooms != 'all' || $type == 'all'){
            $properties =  DB::table('properties')
            ->where('city', '=', $location)
            ->orWhere('postcode', 'like', $location.'%')
            ->where('status', '=', $property_status)
            ->where('no_of_bedrooms', '=', $bedrooms)
            ->get();
     }
     elseif($bedrooms == 'all' || $type != 'all')
     {
        $properties =  DB::table('properties')
            ->where('city', '=', $location)
            ->orWhere('postcode', 'like', $location.'%')
            ->where('status', '=', $property_status)
            ->where('property_category_id', '=', $type)
            ->get();
     }elseif($bedrooms != 'all' || $type != 'all')
     {
        $properties =  DB::table('properties')
        ->where('city', '=', $location)
        ->orWhere('postcode', 'like', $location.'%')
        ->where('status', '=', $property_status)
        ->where('property_category_id', '=', $type)
        ->where('no_of_bedrooms', '=', $bedrooms)
        ->get();
     }
     else{
        $properties =  DB::table('properties')
        ->where('city', '=', $location)
        ->orWhere('postcode', 'like', $location.'%')
        ->where('status', '=', $property_status)
        ->get();
     }
     
     
     
    
     return $properties;
 }

 public static function getAllProperties()
 {
     return Property::all();
 }
}