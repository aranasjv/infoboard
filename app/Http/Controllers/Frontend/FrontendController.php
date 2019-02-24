<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Blogs\Blog;
use App\Models\Announcement\Announcement;
use App\Models\Event\Event;
use App\Models\Video\Video;
use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use Calendar;
use Illuminate\Support\Facades\DB;

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
        $blogs = Blog::all()->sortByDesc("id");;
        $videos=Video::paginate(1);;
        $announcements=Announcement::all()->sortByDesc("id");;
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#192934',
                        'url' => 'event/view/'.$value->id,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)
        ->setOptions([ //set fullcalendar options
        'header' => [
            'left' => 'title',
            'center' =>'',
            'right' => 'today prev,next'],
    ]
        );

        return view('frontend.index', compact('blogs','calendar','announcements','videos'));
    }


    public function showPost($slug)
    {
        //fetch from the databse on slug and return the view and pass in the post object
        $blog = Blog::where('slug','=',$slug)->first();
        return view('frontend.singlePost')->withBlog($blog);
    }

    public function showEvent($id)
    {
        //fetch from the databse on slug and return the view and pass in the post object
        $event = Event::where('id','=',$id)->first();
        return view('frontend.singleEvent')->withEvent($event);
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
