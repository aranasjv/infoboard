<?php

namespace App\Models\Announcement;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Announcement\Traits\AnnouncementAttribute;
use App\Models\Announcement\Traits\AnnouncementRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use ModelTrait,
        SoftDeletes,
        AnnouncementAttribute,
    	AnnouncementRelationship {
            // AnnouncementAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table;

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = ['title', 'content','start_date','end_date', 'created_at', 'updated_at'];
    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.announcements.table');
    }
}
