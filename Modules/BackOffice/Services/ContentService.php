<?php 

namespace Modules\BackOffice\Services;

use Modules\BackOffice\Entities\Page;
use Modules\BackOffice\Entities\PageContent;
use JD\Cloudder\Facades\Cloudder;

class ContentService
{

    public static function getPageContentByName($page_id, $content_name)
    {
        return PageContent::where('page_id','=', $page_id)
                ->where('content_name','=',$content_name)->first();
    }

    public static function updateFeesPageContent($data)
    {
        $node_1 = PageContent::where('content_name', '=', 'fees_content_node_1')->first();
        $node_1->content = $data['fees_content_node_1'];
       return $node_1->save();
    }

    public static function updateServicesPageContent($data)
    {
        $node_1 = PageContent::where('content_name', '=', 'services_content_node_1')->first();
        $node_1->content = $data['services_content_node_1'];
        return $node_1->save();
    }

    public static function updateLandlordSellersPageContent($data)
    {
        $node_1 = PageContent::where('content_name', '=', 'landlord_sellers_content_node_1')->first();
        $node_1->content = $data['landlord_sellers_content_node_1'];
        return $node_1->save();
    }
}