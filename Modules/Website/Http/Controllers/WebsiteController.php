<?php

namespace Modules\Website\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Website\Services\WebsiteService;
use Modules\Property\Services\PropertyService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Illuminate\Routing\Controller as BaseController;

class WebsiteController extends BaseController
{
    use  ValidatesRequests;
    public function index(Request $request)
    {
        return view('website.pages.index');
    }

    public function searchProperty(Request $request)
    {
       $location = $request->get('location');
       $intent = $request->get('intent');
       $type = $request->get('type');
       $bedrooms = $request->get('bedrooms');
       $propertyCategories = PropertyService::getAllCategories();
       $properties = WebsiteService::searchProperty($location,$intent,$bedrooms,$type);
       //dd($properties);
      // die;
       return view('website.pages.property', compact('properties','propertyCategories'));
    }

    public function allProperties(Request $request)
    {
        $properties = WebsiteService::getAllProperties();
        $propertyCategories = PropertyService::getAllCategories();
        return view('website.pages.property', compact('properties','propertyCategories'));
    }

    public function propertyDetails($id)
    {
        $property = WebsiteService::getProperty($id);
        return view('website.pages.property_details', compact('property'));
    }

    public function bookViewing($status, $id)
    {
        $data['status'] = $status;
        $data['id'] = $id;
        return view('website.pages.book_appointment', compact('data'));
    }

    public function bookPropertyAppointment(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'preferred_date' => 'required|date|after:tomorrow',
            'preferred_time' => 'required',
            'additional_information' => 'required'
        );
        $status = $request->input('status');
        $propertyId = $request->input('property_id');

        $this->validate($request,$rules);
        $data = $request->all();
        $appointment = WebsiteService::createPropertyAppointment($data);
        if($appointment){
            return redirect()->route('bookViewing',['status' => $status, 'id' => $propertyId])->with('bookApptSuccess', 'The office will be in touch shortly to confirm your appointment.');;
        }
    }

    public function requestPropertyInformation($status, $id)
    {
        $data['status'] = $status;
        $data['id'] = $id;
        $property = WebsiteService::getProperty($id);
        return view('website.pages.request_details', compact('data','property'));
    }
}
