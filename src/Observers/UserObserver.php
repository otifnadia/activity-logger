<?php

namespace Otifsolutions\ActivityLogger\Observers;

use Otifsolutions\ActivityLogger\Services\ActivityLogger;

class UserObserver
{
    public function created($model)
    {
        ActivityLogger::log('created', get_class($model), $model->id, 'Created record');
    }

    public function updated($model)
    {
        ActivityLogger::log('updated', get_class($model), $model->id, 'Updated record');
    }

    public function deleted($model)
    {
        ActivityLogger::log('deleted', get_class($model), $model->id, 'Deleted record');
    }
}
