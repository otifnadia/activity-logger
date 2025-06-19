<?php
return [
    'models' => [
        App\Models\User::class => Otifsolutions\ActivityLogger\Observers\UserObserver::class,
    ],
];

