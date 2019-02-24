<?php

namespace App\Models\Video;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video\Traits\VideoAttribute;
use App\Models\Video\Traits\VideoRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use ModelTrait,
        VideoAttribute,
    	VideoRelationship {
            // VideoAttribute::getEditButtonAttribute insteadof ModelTrait;
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
    protected $fillable = [
        'title',
        'video_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

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
        $this->table = config('module.videos.table');
    }
}
