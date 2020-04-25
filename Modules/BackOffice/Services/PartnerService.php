<?php 

namespace Modules\BackOffice\Services;

use Modules\BackOffice\Entities\Partner;
use Modules\BackOffice\Entities\PartnerCategory;
use Modules\BackOffice\Entities\PartnerDocument;
use JD\Cloudder\Facades\Cloudder;

class PartnerService
{

    public static function getAllCategories()
    {
        return PartnerCategory::all();
    }

    public static function getPartnerById($id)
    {
        return Partner::find($id);
    }

    public static function getAllPartners()
    {
        return Partner::all();
    }

    public static function getTenants()
    {
        return Partner::where('partner_category_id', 3)->get();
    }
    public static function getBuyers()
    {
        return Partner::where('partner_category_id', 1)->get();
    }
    public static function getSellers()
    {
        return Partner::where('partner_category_id', 2)->get();
    }
    public static function createPartner($data)
    {
        $partner = new Partner();
        $partner->first_name =  $data['first_name'];
        $partner->last_name = $data['last_name'];
        $partner->partner_category_id = $data['partner_category_id'];
        $partner->email = $data['email'];
        $partner->phone = $data['phone'];
        $partner->house_number = $data['house_number'];
        $partner->street = $data['street'];
        $partner->city = $data['city'];
        $partner->postcode = $data['postcode'];
        $partner->country = $data['country'];
        $isSaved = $partner->save();
        if($isSaved){
            self::submitDocument($data['proof_of_identity'], $partner, 'Proof of Identity');
            self::submitDocument($data['proof_of_address'], $partner, 'Proof of Address');
        }
        return $isSaved;
    }

    public static function updatePartner($data)
    {
        try
        {
            $partner = self::getPartnerById($data['partner_id']);
            $partner->first_name = $data['first_name'];
            $partner->last_name = $data['last_name'];
            $partner->partner_category_id = $data['partner_category_id'];
            $partner->email = $data['email'];
            $partner->phone = $data['phone'];
            $partner->street = $data['street'];
            $partner->city = $data['city'];
            $partner->postcode = $data['postcode'];
            $partner->country = $data['country'];
            $partner->status = $data['status'];
            $isSaved = $partner->save();
            if($isSaved)
            {
                if(!empty($data['proof_of_identity'])){
                    $old_proof_of_identity =  PartnerDocument::find($partner->getProofOfIdentity());
                    if(!empty($old_proof_of_identity)){
                        Cloudder::delete($old_proof_of_identity[0]->document_file);
                        PartnerDocument::destroy($partner->getProofOfIdentity()->id);
                    }
                     self::submitDocument($data['proof_of_identity'], $partner, 'Proof of Identity');
                }
    
                if(!empty($data['proof_of_address'])){
                    $old_proof_of_address =  PartnerDocument::find($partner->getProofOfAddress());
                    if(!empty($old_proof_of_address)){
                        Cloudder::delete($old_proof_of_address[0]->document_file);
                        PartnerDocument::destroy($partner->getProofOfAddress()->id);
                    }
                    self::submitDocument($data['proof_of_address'], $partner, 'Proof of Address');
                }
            }
            return $isSaved;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
       
    }

    public static function submitDocument($document, $partner, $docTitle)
    {
        $docName = $document->getClientOriginalName();
        $docPrefix = mt_rand(1,99999);
        $docFilePath = $document->getRealPath();
        Cloudder::upload($docFilePath, $docPrefix.$docName);
        $docCloudinaryId = Cloudder::getPublicId();
        $docFileCloudResource = array();
        $docFileCloudResource = Cloudder::getResult($docCloudinaryId);
        $docUrl = $docFileCloudResource['url'];

        $docFileData['partner_id'] = $partner->id;
        $docFileData['document_title'] = $docTitle;
        $docFileData['document_file'] = $docPrefix.$docName;
        $docFileData['document_url'] = $docUrl;
        PartnerDocument::create($docFileData);
    }
}