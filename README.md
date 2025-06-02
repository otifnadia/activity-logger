<<<<<<< HEAD
# activity-logger
=======
Laravel Admin Activity Logger
A reusable Laravel package to automatically log key admin activities (login, create, update, delete) into the database — perfect for auditing, debugging, and accountability.

Features
• Logs login/logout, model create/update/delete actions
• Works out of the box using observers and auth events
• Stores logs with IP, user agent, timestamps
• Fully configurable (choose which models/events to track)
• Built as a clean Laravel package (plug & play)

Installation
1. Add to composer.json:
json
"repositories": [
{
"type": "path",
"url": "packages/otifsolutions/activity-logger"
}
]

Then run:
composer require otifsolutions/activity-logger:dev-main --prefer-source
2. Publish config and migration:
bash
php artisan vendor:publish --tag=activity-logger-config
php artisan migrate


Configuration
In config/activitylogger.php, specify:
php
'models' => [
App\Models\User::class,
// Add more models here
],



How It Works
• Observers: Listens to created, updated, deleted events
• Auth Events: Logs login and logout
• Logs Include: user_id, action, model, model_id, description, ip, user_agent, timestamp
• Service Class: ActivityLogger handles all log writing
• Autoloading: PSR-4 via composer.json


ile Structure
bash
packages/otifsolutions/activity-logger/
├── src/
│   ├── ActivityLoggerServiceProvider.php
│   ├── Services/ActivityLogger.php
│   ├── Observers/UserObserver.php
│   └── Models/ActivityLog.php
├── config/activitylogger.php
├── database/migrations/create_activity_logs_table.php
├── composer.json
└── README.md
>>>>>>> 994a6e6 (Initial commit of Laravel Admin Activity Logger Package)
