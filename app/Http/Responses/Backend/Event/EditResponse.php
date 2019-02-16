<?php

namespace App\Http\Responses\Backend\Event;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Event\Event
     */
    protected $events;

    /**
     * @param App\Models\Event\Event $events
     */
    public function __construct($events)
    {
        $this->events = $events;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.events.edit')->with([
            'events' => $this->events
        ]);
    }
}