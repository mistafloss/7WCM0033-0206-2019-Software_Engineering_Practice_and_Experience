<?php

namespace Modules\BackOffice\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\BackOffice\Services\PartnerService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class PartnerController extends BaseController
{
    use  ValidatesRequests;

    public function __construct(){
        
    }
    public function index()
    {
        $partners = PartnerService::getAllPartners();
        return view('backoffice.pages.partners.index', compact('partners'));
    }

    public function addNew(Request $request)
    {
        // $user = $request->user();
        // //dd($user);
        // //dd($user->can('can_cancel_property_sale'));
        $categories = PartnerService::getAllCategories();
        return view('backoffice.pages.partners.newpartner', compact('categories'));
    }

    public function createPartner(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'partner_category_id' => 'required',
            'house_number' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'proof_of_identity' => 'required|mimes:png,gif,jpeg,jpg,pdf',
            'proof_of_address' => 'required|mimes:png,gif,jpeg,jpg,pdf',
        );
     
        $messages = [
            'partner_category_id.required' => 'The partner category field is required',
        ];
        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $partnerCreated = PartnerService::createPartner($data);
        if($partnerCreated){
            return redirect()->route('partnerIndex')->with('partnerSuccess', 'Partner successfully added');
        }
    }

    public function showPartner($id)
    {
        $categories = PartnerService::getAllCategories();
        $partner = PartnerService::getPartnerById($id);
        return view('backoffice.pages.partners.editpartner', compact('categories','partner'));
    }

    public function updatePartner(Request $request)
    {
        //dd($request->all());
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'partner_category_id' => 'required',
            'house_number' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'proof_of_identity' => 'mimes:png,gif,jpeg,jpg,pdf',
            'proof_of_address' => 'mimes:png,gif,jpeg,jpg,pdf'
        );

        $messages = [
            'property_category_id.required' => 'The property type field is required',
        ];
        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $partnerUpdated = PartnerService::updatePartner($data);
        if($partnerUpdated){
            return redirect()->route('partnerIndex')->with('partnerSuccess', 'Partner successfully updated');
        }
    }
}
