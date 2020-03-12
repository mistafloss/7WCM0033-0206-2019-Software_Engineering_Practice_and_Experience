<?php 

namespace Modules\Property\Services;

use Modules\Property\Entities\Property;
use Modules\Property\Entities\PropertyCategory;


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
}