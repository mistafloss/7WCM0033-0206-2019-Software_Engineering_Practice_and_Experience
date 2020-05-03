<?php

namespace Modules\BackOffice\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\BackOffice\Services\ContentService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class ContentController extends BaseController
{
    use  ValidatesRequests;

    public function __construct()
    {
        
    }

    public function fees()
    {
        $fees_content_node_1 = ContentService::getPageContentByName(1,'fees_content_node_1');
        //dd($fees_content_node_1);
        $content['fees_content_node_1'] = $fees_content_node_1['content'];
        return view('backoffice.pages.contentmanagement.fees', compact('content'));
    }

    public function postFeesContent(Request $request)
    {
        $rules = array(
            'fees_content_node_1' => 'required',
        );
        $messages = [
            'fees_content_node_1.required' => 'The field cannot be blank'
        ];
        $data = $request->all();
        $contentUpdated = ContentService::updateFeesPageContent($data);
        if($contentUpdated){
            return redirect()->route('feesContent')->with('contentSuccess', 'Content updated.');
        }
    }

    public function services()
    {
         $services_content_node_1 = ContentService::getPageContentByName(2,'services_content_node_1');
         $content['services_content_node_1'] = $services_content_node_1['content'];
         return view('backoffice.pages.contentmanagement.services', compact('content'));
    }

    public function postServicesContent(Request $request)
    {
        $rules = array(
            'services_content_node_1' => 'required',
        );
        $messages = [
            'services_content_node_1.required' => 'The field cannot be blank'
        ];
        $data = $request->all();
        $contentUpdated = ContentService::updateServicesPageContent($data);
        if($contentUpdated){
            return redirect()->route('servicesContent')->with('contentSuccess', 'Content updated.');
        }
    }
}