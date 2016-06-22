<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Repositories\Category\BaumCategoryRepository;
use App\Repositories\Blog\ArticleRepository;

class HomeController extends Controller
{
    
    protected $category = null;
    protected $article = null;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BaumCategoryRepository $category, ArticleRepository $article)
    {
        $this->category = $category;
        $this->article = $article;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $pageTitle = config('seo.main_page.title');
        $pageDescription = config('seo.main_page.description');
        $pageKeywords = config('seo.main_page.keywords');
        $sliderIsActive = true;
        $cechyNode = $this->category->getCechyNode();
        $cechyChilds = $cechyNode->children()->get();
        
        $this->article->pushCriteria(new \App\Repositories\Blog\Criteria\OrderByCreatedAt('desc'));
        $articles = $this->article->paginate(3);
        
        return view('front.home.index', compact('pageTitle', 'pageDescription', 'pageKeywords', 'sliderIsActive', 'cechyChilds', 'articles'));
    }
}
