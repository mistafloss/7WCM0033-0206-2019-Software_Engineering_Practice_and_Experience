<?php

namespace Modules\BackOffice\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\BackOffice\Services\NewsService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class NewsController extends BaseController
{
    use  ValidatesRequests;

    public function __construct(){
        
    }

    public function index()
    {
        $articles = NewsService::getAllArticles();
        return view('backoffice.pages.news.index', compact('articles'));
    }

    public function newArticle()
    {
        return view('backoffice.pages.news.add_article');
    }

    public function postNewArticle(Request $request)
    {
        $rules = array(
            'slug' => 'required',
            'title' => 'required',
            'intro_text' => 'required',
            'content' => 'required',
            'image_file' => 'required|mimes:png,gif,jpeg,jpg',
        );
     
        $messages = [
            'image_file.required' => 'Please upload an image for the article',
            'image_file.mimes' => 'File type must be an image',
            'intro_text.required' => 'The article display text cannot be blank'
        ];
        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $articleCreated = NewsService::addArticle($data);
       
        if($articleCreated){
            return redirect()->route('newsIndex')->with('articleSuccess', 'Article successfully added');
        }
    }

    public function updateArticle($id)
    {
        $article = NewsService::getArticle($id);
        return view('backoffice.pages.news.update_article', compact('article'));
    }

    public function postUpdateArticle(Request $request)
    {
        $rules = array(
            'slug' => 'required',
            'title' => 'required',
            'intro_text' => 'required',
            'content' => 'required',
            'image_file' => 'mimes:png,gif,jpeg,jpg',
        );
        $messages = [
            'image_file.mimes' => 'File type must be an image',
            'intro_text.required' => 'The article display text cannot be blank'
        ];
        $data = $request->all();
        $articleUpdated = NewsService::updateArticle($data);
        if($articleUpdated){
            return redirect()->route('updateArticle',['id' => $data['article_id']])->with('articleSuccess', 'Article successfully updated');
        }
    }
}