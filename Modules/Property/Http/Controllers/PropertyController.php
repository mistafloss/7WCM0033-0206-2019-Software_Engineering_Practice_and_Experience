<?php

namespace Modules\Property\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Property\Services\PropertyService;
use Modules\BackOffice\Services\PartnerService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;


use Illuminate\Routing\Controller as BaseController;

class PropertyController extends BaseController
{
    use  ValidatesRequests;

    public function __construct(Request $request)
    {
       $this->middleware('auth');
    }

    public function categoryIndex(Request $request)
    {
        $categories = PropertyService::getAllCategories();
        return view('backoffice.pages.propertymanagement.property_categories', compact('categories'));
    }

    public function propertyIndex(Request $request)
    {   
        $properties = PropertyService::getAllProperties();
        return view('backoffice.pages.propertymanagement.properties', compact('properties'));
    }

    public function addNewProperty(Request $request)
    {
        $categories = PropertyService::getAllCategories();
        return view('backoffice.pages.propertymanagement.newproperty', compact('categories'));
    }

    public function showProperty($id)
    {
        $categories = PropertyService::getAllCategories();
        $property = PropertyService::getPropertyById($id);
        return view('backoffice.pages.propertymanagement.editproperty', compact('categories','property'));
    }

    public function updateProperty(Request $request)
    {
        $rules = array(
            'listing_title' => 'required',
            'house_number' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'brief_description' => 'required',
            'property_features' => 'required',
            'property_description' => 'required',
            'property_category_id' => 'required',
            'property_price' => 'required|numeric',
            'property_status' => 'required',
            'publish_property' => 'required',
            'property_images.*' => 'mimes:png,gif,jpeg,jpg',
            'no_of_bedrooms' => 'required'
        );
     
        $messages = [
            'property_category_id.required' => 'The property type field is required',
            'no_of_bedrooms.required' => 'Please select the number of bedrooms'
        ];

        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $propertyUpdated = PropertyService::updateProperty($data);
        if($propertyUpdated){
            return redirect()->route('propertyIndex')->with('propertyUpdateSuccess', 'Property successfully updated');
        }
    }

    public function deleteImage(Request $request)
    {
        $data = $request->all();
        if(PropertyService::deletePhoto($data)){
            return redirect()->route('showProperty', $data['property_id'])->with('imageDeleteSuccess', 'Photo successfully deleted');
        }
    }

    public function addNewTenancy()
    {
        $propertiesToLet = PropertyService::getPropertiesToLet();
        $partners = PartnerService::getTenants();
        return view('backoffice.pages.propertymanagement.add_tenancy', compact('propertiesToLet','partners'));
    }

    public function getTenancies()
    {
        $properties = PropertyService::getAllProperties();
        return view('backoffice.pages.propertymanagement.tenancies', compact('properties'));
    }

    public function activateNewTenancy(Request $request)
    {
        $rules = array(
            'property_id' => 'required',
            'partner_id' => 'required',
            'start_date' => 'required|before:end_date',
            'end_date' => 'required',
            'deposit' => 'required|numeric',
        );

        $messages = [
            'property_id.required' => 'The Property field is required',
            'partner_id.required' => 'Please select the Principal tenant for the tenancy',
        ];
        
        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $transaction = PropertyService::activateNewTenancy($data);
        if($transaction){
            return redirect()->route('getTenancies')->with('tenancySuccess', 'New Tenancy successfully activated');;
        }
    }

    public function showTenancy($id)
    {  //rent, end date and tenant are the only fields that are editable
        $partners = PartnerService::getTenants();
        $tenancy = PropertyService::getTenancy($id);
        return view('backoffice.pages.propertymanagement.edit_tenancy', compact('tenancy','partners'));
    }

    public function updateTenancy(Request $request)
    {
        $rules = array(
            'start_date' => 'before:end_date',
            'end_date' => 'required',
        );

        $this->validate($request,$rules);
        $data = $request->all();
        $transaction = PropertyService::updateTenancy($data);
        if($transaction){
            return redirect()->route('getTenancies')->with('tenancySuccess', 'Tenancy updated');;
        }
    }

    public function getSales()
    {
        $sales = PropertyService::getSales();
        return view('backoffice.pages.propertymanagement.sales', compact('sales'));
    }

    public function addNewSale()
    {
        $propertiesForSale = PropertyService::getPropertiesForSale();
        $buyers = PartnerService::getBuyers();
        $sellers = PartnerService::getSellers();
        return view('backoffice.pages.propertymanagement.add_sale', compact('propertiesForSale','buyers','sellers'));
    }

    public function completePropertyPurchase(Request $request)
    {
        //validate 
        //
        $rules = array(
            'property_id' => 'required',
            'buyer_id' => 'required',
            'seller_id' => 'required',
            'date_sold' => 'required',
        );

        $messages = [
            'property_id.required' => 'The Property is required',
            'buyer_id.required' => 'Please select the Property buyer',
            'seller_id.required' => 'Please select the Property seller',
        ];
        
        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $sale = PropertyService::completeSale($data);
        //dd($sale);
        if($sale){
            return redirect()->route('getSales')->with('saleSuccess', 'Property Sale completed');;
        }
    }

    public function showSale($id)
    {
        $buyers = PartnerService::getBuyers();
        $sellers = PartnerService::getSellers();
        $sale = PropertyService::getSale($id);
        return view('backoffice.pages.propertymanagement.show_sale', compact('buyers','sellers','sale'));
    }

    public function unlockPropertyForResale(Request $request)
    {
        //add a deleted_at date to the sale
        //change the status of the property back to forsale
        $sale_id = $request->input('sale_id');
        $propertyUnlock = PropertyService::unlockPropertyForSale($sale_id);
        if($propertyUnlock){
            return redirect()->route('showSale',$sale_id)->with('saleSuccess', 'Property has been unlocked for re-sale');
        }
    }

    public function getAppointments()
    {
        $appointments = PropertyService::getAppointments();
        return view('backoffice.pages.propertymanagement.viewing_appointments', compact('appointments'));
    }

    public function getAppointmentDetails($id)
    {
        $appointment = PropertyService::getAppointment($id);
        $notes = PropertyService::getAppointmentNotes($id); 
        return view('backoffice.pages.propertymanagement.view_appointment_detail', compact('appointment', 'notes'));
    }

    public function changeAppointmentStatus(Request $request)
    {
        $data = $request->all();
        $apptStatusChange = PropertyService::changeAppointmentStatus($data);
        if($apptStatusChange){
            return redirect()->route('getAppointmentDetails',['id' => $data['id']])->with('apptUpdateSuccess', 'Appointment details updated');;
        }
    }

    public function getPropertyEnquiries()
    {
        $enquiries = PropertyService::getPropertyEnquiries();
        return view('backoffice.pages.propertymanagement.information_requests', compact('enquiries'));
    }

    public function getEnquiryDetails($id)
    {
        $enquiry = PropertyService::getEnquiryById($id);
        return view('backoffice.pages.propertymanagement.view_information_request', compact('enquiry'));
    }

    public function changeEnquiryStatus(Request $request)
    {
        $data = $request->all();
        $enqiryStatusChange = PropertyService::changeEnquiryStatus($data);
        if($enqiryStatusChange){
            return redirect()->route('getEnquiryDetails',['id' => $data['id']])->with('enquiryUpdateSuccess', 'Property enquiry updated.');;
        }
    }
}
