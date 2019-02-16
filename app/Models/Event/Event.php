<?php

namespace App\Models\Event;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event\Traits\EventAttribute;
use App\Models\Event\Traits\EventRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use ModelTrait,
        SoftDeletes,
        EventAttribute,
    	EventRelationship {
            // EventAttribute::getEditButtonAttribute insteadof ModelTrait;
        }


    protected $table;

    protected $fillable = ['title', 'content','start_date','end_date', 'created_at', 'updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.events.table');
    }
}
