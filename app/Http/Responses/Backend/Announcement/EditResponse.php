<?php

namespace App\Http\Responses\Backend\Announcement;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Announcement\Announcement
     */
    protected $announcements;

    /**
     * @param App\Models\Announcement\Announcement $announcements
     */
    public function __construct($announcements)
    {
        $this->announcements = $announcements;
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
        return view('backend.announcements.edit')->with([
            'announcements' => $this->announcements
        ]);
    }
}