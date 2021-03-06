<?php

namespace App\Models\Video\Traits;

/**
 * Class VideoAttribute.
 */
trait VideoAttribute
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
                '.$this->getEditButtonAttribute("edit-video", "admin.videos.edit").'
                '.$this->getDeleteButtonAttribute("delete-video", "admin.videos.destroy").'
                </div>';
    }
}
