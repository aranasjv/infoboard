<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Blogs\Blog;
use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $blogs=Blog::all();

        return view('frontend.index', compact('blogs'));
    }


    public function show($slug)
    {
        //fetch from the databse on slug and return the view and pass in the post object
        $blog = Blog::where('slug','=',$slug)->first();
        return view('frontend.single')->withBlog($blog);
    }
    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }
}
