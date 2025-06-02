<?php

//return [
//    'observe' => [
//        App\Models\User::class,
//        App\Models\Post::class,
//    ],
//    'log_events' => ['created', 'updated', 'deleted'],
//    'table_name' => 'activity_logs',
//];


return [
    'models' => [
        App\Models\User::class => Otifsolutions\ActivityLogger\Observers\UserObserver::class,
    ],
];

