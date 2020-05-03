<?php 

namespace Modules\BackOffice\Services;

use Modules\BackOffice\Entities\News;
use JD\Cloudder\Facades\Cloudder;

class NewsService
{
    public static function getAllArticles()
    {
        return News::all();
    }

    public static function addArticle($data)
    {
        try
        {

            $fileName = $data['image_file']->getClientOriginalName();
            $filePrefix = mt_rand(1,99999);
            $filePath = $data['image_file']->getRealPath();

            Cloudder::upload($filePath, $filePrefix.$fileName);
            $fileCloudinaryId = Cloudder::getPublicId();
            $fileCloudResource = array();
            $fileCloudResource = Cloudder::getResult($fileCloudinaryId);
            $fileUrl = $fileCloudResource['url'];

            $news = new News();
            $news->slug = $data['slug'];
            $news->title = $data['title'];
            $news->intro_text = $data['intro_text'];
            $news->image_file = $filePrefix.$fileName;
            $news->image_url = $fileUrl;
            $news->content = $data['content'];
            $newsSaved = $news->save();
            return $newsSaved;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function getArticle($id)
    {
        return News::find($id);
    }

    public static function updateArticle($data)
    {
        try
        {
            $news = self::getArticle($data['article_id']);

            if(!empty($data['image_file'])){
                Cloudder::delete($news->image_file);
    
                $fileName = $data['image_file']->getClientOriginalName();
                $filePrefix = mt_rand(1,99999);
                $filePath = $data['image_file']->getRealPath();
    
                Cloudder::upload($filePath, $filePrefix.$fileName);
                $fileCloudinaryId = Cloudder::getPublicId();
                $fileCloudResource = array();
                $fileCloudResource = Cloudder::getResult($fileCloudinaryId);
                $fileUrl = $fileCloudResource['url'];
                $news->image_file = $filePrefix.$fileName;
                $news->image_url = $fileUrl;
            }
                $news->slug = $data['slug'];
                $news->title = $data['title'];
                $news->intro_text = $data['intro_text'];
                $news->content = $data['content'];
                $newsUpdated = $news->save();
                return $newsUpdated;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
      
    }
}