<?php

namespace App\Http\Controllers\Backend\Event;

use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Event\CreateResponse;
use App\Http\Responses\Backend\Event\EditResponse;
use App\Repositories\Backend\Event\EventRepository;
use App\Http\Requests\Backend\Event\ManageEventRequest;
use App\Http\Requests\Backend\Event\CreateEventRequest;
use App\Http\Requests\Backend\Event\StoreEventRequest;
use App\Http\Requests\Backend\Event\EditEventRequest;
use App\Http\Requests\Backend\Event\UpdateEventRequest;
use App\Http\Requests\Backend\Event\DeleteEventRequest;

/**
 * EventsController
 */
class EventsController extends Controller
{
    /**
     * variable to store the repository object
     * @var EventRepository
     */
    protected $event;

    /**
     * contructor to initialize repository object
     * @param EventRepository $repository;
     */
    public function __construct(EventRepository $event)
    {
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Event\ManageEventRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageEventRequest $request)
    {
        return new ViewResponse('backend.events.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateEventRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Event\CreateResponse
     */
    public function create(CreateEventRequest $request)
    {
        return new CreateResponse('backend.events.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEventRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreEventRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);

        //send notification
        $topic = 'test';

        fcm()
            ->toTopic("test") // $topic must an string (topic name)
            ->notification([
                'title' => 'New event has been added on calendar!!',
                'body' => 'Check it',
            ])
            ->send();
        //Create the model using repository create method
        $this->event->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.events.index'), ['flash_success' => trans('alerts.backend.events.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Event\Event  $event
     * @param  EditEventRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Event\EditResponse
     */
    public function edit(Event $event, EditEventRequest $request)
    {
        return new EditResponse($event);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEventRequestNamespace  $request
     * @param  App\Models\Event\Event  $event
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->event->update( $event, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.events.index'), ['flash_success' => trans('alerts.backend.events.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteEventRequestNamespace  $request
     * @param  App\Models\Event\Event  $event
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Event $event, DeleteEventRequest $request)
    {
        //Calling the delete method on repository
        $this->event->delete($event);
        //returning with successfull message
        return new RedirectResponse(route('admin.events.index'), ['flash_success' => trans('alerts.backend.events.deleted')]);
    }
    
}
