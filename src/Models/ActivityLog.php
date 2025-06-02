<?php

namespace Otifsolutions\ActivityLogger\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id', 'action', 'model', 'model_id', 'description', 'ip', 'user_agent'
    ];
}
