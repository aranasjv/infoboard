<?php

namespace App\Repositories\Backend\Event;

use DB;
use Carbon\Carbon;
use App\Models\Event\Event;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventRepository.
 */
class EventRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Event::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.events.table').'.id',
                config('module.events.table').'.title',
                config('module.events.table').'.content',
                config('module.events.table').'.start_date',
                config('module.events.table').'.end_date',
                config('module.events.table').'.created_at',
                config('module.events.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Event::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.events.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Event $event
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Event $event, array $input)
    {
    	if ($event->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.events.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Event $event
     * @throws GeneralException
     * @return bool
     */
    public function delete(Event $event)
    {
        if ($event->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.events.delete_error'));
    }
}
