<?php

namespace App\Http\Controllers\Backend\Announcement;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Announcement\AnnouncementRepository;
use App\Http\Requests\Backend\Announcement\ManageAnnouncementRequest;

/**
 * Class AnnouncementsTableController.
 */
class AnnouncementsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AnnouncementRepository
     */
    protected $announcement;

    /**
     * contructor to initialize repository object
     * @param AnnouncementRepository $announcement;
     */
    public function __construct(AnnouncementRepository $announcement)
    {
        $this->announcement = $announcement;
    }

    /**
     * This method return the data of the model
     * @param ManageAnnouncementRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAnnouncementRequest $request)
    {
        return Datatables::of($this->announcement->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($announcement) {
                return Carbon::parse($announcement->created_at)->toDateString();
            })
            ->addColumn('actions', function ($announcement) {
                return $announcement->action_buttons;
            })
            ->make(true);
    }
}
