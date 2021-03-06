<?php 

namespace Modules\Website\Services;

use Modules\Property\Entities\Property;
use Modules\Property\Entities\PropertyAppointment;
use Modules\Property\Entities\PropertyInformationRequest;
use Modules\Property\Entities\PropertyEvaluation;
use Modules\BackOffice\Entities\News;
use Modules\BackOffice\Entities\PageContent;
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
     return Property::where('status', '=', 'To Let')
						->Orwhere('status', '=', 'For Sale')->paginate(5);
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

 public static function createPropertyInformationRequest($data)
 {
    try
    {
        return PropertyInformationRequest::create($data);
    }
    catch(\Exception $ex)
    {
        return $ex->getMessage();
    }
 }

 public static function createpropertyValuationAppointment($data)
 {
    try
    {
        return PropertyEvaluation::create($data);
    }
    catch(\Exception $ex)
    {
        return $ex->getMessage();
    }
 }

 public static function getAllArticles()
 {
    return News::paginate(12);
 }

 public static function getArticleBySlug($slug)
 {
    return News::where('slug', $slug)->first();
 }

 public static function getPageContentByPageId($page_id)
 {
     return PageContent::where('page_id', '=', $page_id)->get();
 }

}