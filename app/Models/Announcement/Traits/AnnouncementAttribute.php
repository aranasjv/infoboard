<?php

namespace App\Models\Announcement\Traits;

/**
 * Class AnnouncementAttribute.
 */
trait AnnouncementAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-announcement", "admin.announcements.edit").'
                '.$this->getDeleteButtonAttribute("delete-announcement", "admin.announcements.destroy").'
                </div>';
    }
}
