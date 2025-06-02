<?php


namespace Otifsolutions\ActivityLogger\Services;


use Illuminate\Support\Facades\Request;
use Otifsolutions\ActivityLogger\Models\ActivityLog;

class ActivityLogger
{
    public static function log($action, $model, $model_id, $description = null)
    {
        ActivityLog::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'action' => $action,
            'model' => $model,
            'model_id' => $model_id,
            'description' => $description,
            'ip' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
        ]);
    }
}

