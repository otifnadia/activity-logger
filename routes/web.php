<?php

use Otifsolutions\ActivityLogger\Models\ActivityLog;

use Illuminate\Support\Facades\Route;

//require __DIR__.'/auth.php';
Route::get('log-test', function () {
    \Log::info('Activity Logger Test');
    return 'Logged!';
});


Route::middleware(['auth'])->group(function () {
    Route::get('/activity-logs', function () {
        $logs = ActivityLog::with('user')->latest()->paginate(20);
        return view('activity-logger::logs', compact('logs'));
    })->name('activity.logs');
});

