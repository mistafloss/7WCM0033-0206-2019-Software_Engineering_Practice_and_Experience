<?php 

namespace Modules\Website\Services;

use Modules\Property\Entities\Property;
use Modules\Website\Entities\PropertyAppointment;
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
     
     $query = Property::with('images')
                ->where('city', '=', $location)
                ->where('status', '=', $property_status);
    
     if($bedrooms != 'all' && $type == 'all'){
            $properties =  $query->where('no_of_bedrooms', '=', $bedrooms)
                            ->orWhere('postcode', 'like', $location.'%')
                            ->get();
     }
     elseif($bedrooms == 'all' && $type != 'all')
     {
            $properties = $query->where('property_category_id', '=', $type)
                            ->orWhere('postcode', 'like', $location.'%')
                            ->get();

     }elseif($bedrooms != 'all' && $type != 'all')
     {
            $properties = $query->where('property_category_id', '=', $type)
                            ->where('no_of_bedrooms', '=', $bedrooms)
                            ->orWhere('postcode', 'like', $location.'%')
                            ->get();
     }
     else{
            $properties = $query->orWhere('postcode', 'like', $location.'%')->get();
     }
     return $properties;
 }

 public static function getAllProperties()
 {
     return Property::all();
 }

 public static function getProperty($id)
 {
     return Property::find($id);
 }
  
 public static function createPropertyAppointment($data)
 {
    try
    {
        return PropertyAppointment::create($data);
    }
    catch(\Exception $ex)
    {
        return $ex->getMessage();
    }
 }
}