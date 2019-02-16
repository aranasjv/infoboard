<?php

namespace App\Http\Controllers\Backend\Announcement;

use App\Models\Announcement\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Announcement\CreateResponse;
use App\Http\Responses\Backend\Announcement\EditResponse;
use App\Repositories\Backend\Announcement\AnnouncementRepository;
use App\Http\Requests\Backend\Announcement\ManageAnnouncementRequest;
use App\Http\Requests\Backend\Announcement\CreateAnnouncementRequest;
use App\Http\Requests\Backend\Announcement\StoreAnnouncementRequest;
use App\Http\Requests\Backend\Announcement\EditAnnouncementRequest;
use App\Http\Requests\Backend\Announcement\UpdateAnnouncementRequest;
use App\Http\Requests\Backend\Announcement\DeleteAnnouncementRequest;

/**
 * AnnouncementsController
 */
class AnnouncementsController extends Controller
{
    /**
     * variable to store the repository object
     * @var AnnouncementRepository
     */
    protected $announcement;

    /**
     * contructor to initialize repository object
     * @param AnnouncementRepository $repository;
     */
    public function __construct(AnnouncementRepository $announcement)
    {
        $this->announcement = $announcement;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Announcement\ManageAnnouncementRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAnnouncementRequest $request)
    {
        return new ViewResponse('backend.announcements.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAnnouncementRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Announcement\CreateResponse
     */
    public function create(CreateAnnouncementRequest $request)
    {
        return new CreateResponse('backend.announcements.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAnnouncementRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAnnouncementRequest $request)
    {
        //Input received from the request

        //send notification
        $topic = 'test';

        fcm()
            ->toTopic("test") // $topic must an string (topic name)
            ->notification([
                'title' => 'Check it',
                'body' => 'New announcement has been added!!',
            ])
            ->send();

        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->announcement->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.announcements.index'), ['flash_success' => trans('alerts.backend.announcements.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Announcement\Announcement  $announcement
     * @param  EditAnnouncementRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Announcement\EditResponse
     */
    public function edit(Announcement $announcement, EditAnnouncementRequest $request)
    {
        return new EditResponse($announcement);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAnnouncementRequestNamespace  $request
     * @param  App\Models\Announcement\Announcement  $announcement
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->announcement->update( $announcement, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.announcements.index'), ['flash_success' => trans('alerts.backend.announcements.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAnnouncementRequestNamespace  $request
     * @param  App\Models\Announcement\Announcement  $announcement
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Announcement $announcement, DeleteAnnouncementRequest $request)
    {
        //Calling the delete method on repository
        $this->announcement->delete($announcement);
        //returning with successfull message
        return new RedirectResponse(route('admin.announcements.index'), ['flash_success' => trans('alerts.backend.announcements.deleted')]);
    }
    
}
