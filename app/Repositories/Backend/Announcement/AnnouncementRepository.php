<?php

namespace App\Repositories\Backend\Announcement;

use DB;
use Carbon\Carbon;
use App\Models\Announcement\Announcement;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnnouncementRepository.
 */
class AnnouncementRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Announcement::class;

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
                config('module.announcements.table').'.id',
                config('module.announcements.table').'.title',
                config('module.announcements.table').'.content',
                config('module.announcements.table').'.created_at',
                config('module.announcements.table').'.updated_at',
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
        if (Announcement::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.announcements.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Announcement $announcement
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Announcement $announcement, array $input)
    {
    	if ($announcement->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.announcements.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Announcement $announcement
     * @throws GeneralException
     * @return bool
     */
    public function delete(Announcement $announcement)
    {
        if ($announcement->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.announcements.delete_error'));
    }
}
