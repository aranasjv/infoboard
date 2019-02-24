<?php

namespace App\Http\Controllers\Backend\Video;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Video\VideoRepository;
use App\Http\Requests\Backend\Video\ManageVideoRequest;

/**
 * Class VideosTableController.
 */
class VideosTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var VideoRepository
     */
    protected $video;

    /**
     * contructor to initialize repository object
     * @param VideoRepository $video;
     */
    public function __construct(VideoRepository $video)
    {
        $this->video = $video;
    }

    /**
     * This method return the data of the model
     * @param ManageVideoRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageVideoRequest $request)
    {
        return Datatables::of($this->video->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($video) {
                return Carbon::parse($video->created_at)->toDateString();
            })
            ->addColumn('actions', function ($video) {
                return $video->action_buttons;
            })
            ->make(true);
    }
}
