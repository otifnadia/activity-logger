# 🛡️ Laravel Admin Activity Logger

A powerful Laravel package that **automatically logs admin user activities** such as login, logout, create, update, and delete into a database — ideal for auditing and tracking administrative actions in your application.

---

## 🎯 Goal

To build a reusable Laravel package that captures key admin actions using **model observers** and **auth events**, and stores them in a dedicated `activity_logs` table.

---

## 📌 Why Use This?

- ✅ Automatically tracks **who did what and when**
- 📦 Plug-and-play integration with **any Laravel app**
- 🔐 Ideal for **audit trails**, **debugging**, or **admin monitoring**
- 📈 Logs are saved with **IP**, **user agent**, and **timestamps**
- 🛠️ Follows **Laravel best practices** (observers, events, service providers)

---


## 🚀 Features

| Feature            | Description                                                                 |
|--------------------|-----------------------------------------------------------------------------|
| 🔁 Model Observers  | Tracks `created`, `updated`, `deleted` events on selected models            |
| 🔐 Auth Events      | Logs `login` and `logout` events for admin users                            |
| 💾 Database Logging | All logs stored in a structured `activity_logs` table                       |
| ⚙️ Configurable      | Control which models to observe using `config/activitylogger.php`           |
| 🧰 Service Class     | Handles centralized logging via `ActivityLogger` service class              |
| 🔧 PSR-4 Support     | Package is auto-discovered by Laravel using Composer PSR-4 autoloading     |

---
##  Automatic Logging
```
Once installed and configured, logging will automatically happen when:
Any of the configured models are created, updated, or deleted
A user logs in or logs out
You do not need to call anything manually

---

## 🛠️ Installation

### ✅ Requirements

- PHP 8.0 or higher
- Laravel  11, or 12

### Step 1: Install via Composer
composer require otifsolutions/activity-logger

```bash
```
```
If you are using this as a local package, add this to your root composer.json:
"repositories": [
  {
    "type": "path",
    "url": "packages/otifsolutions/activity-logger"
  }
]
```
Publish Config & Migration
```
php artisan vendor:publish --provider="Otifsolutions\ActivityLogger\ActivityLoggerServiceProvider"


```
config/activitylogger.php
```

### return [
    'models' => [
        App\Models\User::class,
        .....
    ],

    'log_auth_events' => true,
];


```
