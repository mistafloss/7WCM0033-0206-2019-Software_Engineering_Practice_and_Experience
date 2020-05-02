<?php 

namespace Modules\Property\Services;

use Modules\Property\Entities\Property;
use Modules\Property\Entities\PropertyCategory;
use Modules\Property\Entities\PropertyImage;
use Modules\Property\Entities\PropertyTenancy;
use Modules\Property\Entities\PropertySale;
use Modules\Property\Entities\PropertyAppointment;
use Modules\Property\Entities\PropertyAppointmentNote;
use Modules\Property\Entities\PropertyInformationRequest;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;

class PropertyService
{
    public static function getAllCategories()
    {
        return PropertyCategory::all();
    }

    public static function createCategory($data)
    {
        try
        {
            return PropertyCategory::create($data);
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function getCategoryById($id)
    {
        return PropertyCategory::find($id);
    }

    public static function updatePropertyCategory($data)
    {
        try
        {
            $propertyCategory = self::getCategoryById($data['id']);
            $propertyCategory->name = $data['name'];
            $propertyCategory->description = $data['description'];
            $propertyCategory->save();
            return $propertyCategory;
        }
        catch(\Exception $ex)
        {   
            return $ex->getMessage();
        }
    }

    public static function createProperty($data)
    {
        try
        {
            $property = new Property();
            $property->listing_title = $data['listing_title'];
            $property->house_number = $data['house_number'];
            $property->street = $data['street'];
            $property->city = $data['city'];
            $property->postcode = $data['postcode'];
            $property->country = $data['country'];
            $property->brief_description = $data['brief_description'];
            $property->features = $data['property_features'];
            $property->description = $data['property_description'];
            $property->property_category_id = $data['property_category_id'];
            $property->status = $data['property_status'];
            $property->property_price = $data['property_price'];
            $property->no_of_bedrooms = $data['no_of_bedrooms'];
            if($data['property_status'] == 'For Sale'){
                $property->payment_frequency = "Once";
            }elseif($data['property_status'] == 'To Let'){
                $property->payment_frequency = "Monthly";
            }
            $property->visibility = $data['publish_property'];
            $isSaved = $property->save();
            if($isSaved){
                    foreach($data['property_images'] as $image){
                        $imageName = $image->getClientOriginalName();
                        $imagePrefix = mt_rand(1,99999);
                        $imageFilePath = $image->getRealPath();
                        Cloudder::upload($imageFilePath, $imagePrefix.$imageName);
                        $imageCloudinaryId = Cloudder::getPublicId();
                        $imageFileCloudResource = array();
                        $imageFileCloudResource = Cloudder::getResult($imageCloudinaryId);
                        $imageUrl = $imageFileCloudResource['url'];

                        $imageFileData['property_id'] = $property->id;
                        $imageFileData['property_file'] = $imagePrefix.$imageName;
                        $imageFileData['image_url'] = $imageUrl;
                        PropertyImage::create($imageFileData);
                    }
            }

            return $isSaved;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function getPropertyById($id)
    {
        return Property::find($id);
    }

    public static function getAllProperties()
    {
        return Property::all();
    }


    public static function deletePhoto($data)
    {
        try
        {
            $photo = PropertyImage::find($data['image_id']);
            Cloudder::delete($photo->property_file);
            return PropertyImage::destroy($data['image_id']);

        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function updateProperty($data)
    {
        try
        {
            $property = self::getPropertyById($data['property_id']);
            $property->listing_title = $data['listing_title'];
            $property->house_number = $data['house_number'];
            $property->street = $data['street'];
            $property->city = $data['city'];
            $property->postcode = $data['postcode'];
            $property->country = $data['country'];
            $property->brief_description = $data['brief_description'];
            $property->features = $data['property_features'];
            $property->description = $data['property_description'];
            $property->property_category_id = $data['property_category_id'];
            $property->status = $data['property_status'];
            $property->property_price = $data['property_price'];
            $property->no_of_bedrooms = $data['no_of_bedrooms'];
            if($data['property_status'] == 'For Sale'){
                $property->payment_frequency = "Once";
            }elseif($data['property_status'] == 'To Let'){
                $property->payment_frequency = "Monthly";
            }
            $property->visibility = $data['publish_property'];
            $isSaved = $property->save();
            if($isSaved){
                if(!empty($data['property_images']) ){
                    foreach($data['property_images'] as $image){
                        self::submitImage($image, $property); 
                    }
                }       
            }
            return $isSaved;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function submitImage($image, $property)
    {
        $imageName = $image->getClientOriginalName();
        $imagePrefix = mt_rand(1,99999);
        $imageFilePath = $image->getRealPath();
        Cloudder::upload($imageFilePath, $imagePrefix.$imageName);
        $imageCloudinaryId = Cloudder::getPublicId();
        $imageFileCloudResource = array();
        $imageFileCloudResource = Cloudder::getResult($imageCloudinaryId);
        $imageUrl = $imageFileCloudResource['url'];

        $imageFileData['property_id'] = $property->id;
        $imageFileData['property_file'] = $imagePrefix.$imageName;
        $imageFileData['image_url'] = $imageUrl;
        PropertyImage::create($imageFileData);
    }

    public static function tenancies()
    {
        return Property::with('tenancies')->get();
    }

    public static function getPropertiesToLet()
    {
        return Property::where('status', 'To Let')->get();
    }

    public static function activateNewTenancy($data)
    {
       
        try
        {
            $exception = DB::transaction(function() use ($data)
            {
                PropertyTenancy::create($data);
                $propertyToUpdate = Property::find($data['property_id']);
                $propertyToUpdate->status = 'Rented';
                $propertyToUpdate->save();
            });
            return is_null($exception) ? true : $exception;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
        
    }

    public static function getTenancy($id)
    {
        return PropertyTenancy::find($id);
    }

    public static function updateTenancy($data)
    {
        try
        {
            $exception = DB::transaction(function() use ($data)
            {
                $tenancyToUpdate = self::getTenancy($data['tenancy_id']);
                $tenancyToUpdate->partner_id = $data['partner_id'];
                $tenancyToUpdate->end_date = $data['end_date'];
                $tenancyToUpdate->status = $data['status'];
                $tenancyToUpdate->save();
                if($data['status'] == 0)
                {
                    self::updatePropertyStatus($data['property_id'],'To Let');
                }
            });
            return is_null($exception) ? true : $exception;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function getPropertiesForSale()
    {
        return Property::where('status', 'For Sale')->get();
    }

    public static function completeSale($data)
    {
        try
        {
            $exception = DB::transaction(function() use ($data)
            {
                PropertySale::create($data);
                self::updatePropertyStatus($data['property_id'],'Sold');
            });
            return is_null($exception) ? true : $exception;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    private static function updatePropertyStatus($id,$property_status)
    {
        $propertyToUpdate = Property::find($id);
        $propertyToUpdate->status = $property_status;
        $propertyToUpdate->save();
    }

    public static function getSale($id)
    {
        return PropertySale::withTrashed()->find($id);
    }

    public static function unlockPropertyForSale($id)
    {
        try
        {
            $exception = DB::transaction(function() use ($id)
            {
                $sale = self::getSale($id);
                self::updatePropertyStatus($sale->property_id,'For Sale');
                $sale->delete();
            });
            return is_null($exception) ? true : $exception;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function getSales()
    {
        return PropertySale::withTrashed()->get();
    }

    public static function getAppointments()
    {
        return PropertyAppointment::all();
    }

    public static function getAppointment($id)
    {
        return PropertyAppointment::find($id);
    }

    public static function createViewAppointmentNote($data)
    {
        try
        {
            return PropertyAppointmentNote::create($data);
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function getAppointmentNotes($id)
    {
        return PropertyAppointmentNote::where('property_appointment_id', $id)->get();
    }

    public static function changeAppointmentStatus($data)
    {
        try
        {
            $appointment = self::getAppointment($data['id']);
            $appointment->status = $data['status'];
            return $appointment->save();
        }  
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
       
    }

    public static function getPropertyEnquiries()
    {
        return PropertyInformationRequest::all();
    }

    public static function getEnquiryById($id)
    {
        return PropertyInformationRequest::find($id);
    }

    public static function changeEnquiryStatus($data)
    {
        try
        {
            $enquiry = self::getEnquiryById($data['id']);
            $enquiry->status = $data['status'];
            return $enquiry->save();
        }  
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }
}