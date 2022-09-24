<?php

declare(strict_types = 1);

return [

    'model' => [
        /**
         * This is the model that will be used to manage the Activity Logs.
         *
         * It is required that it:
         * - Implements the "NeueCommerce\ActivityLogger\Contracts\ActivityLoggerInterface" interface
         * - Extends the "Illuminate\Database\Eloquent\Model" class
         */

        'class' => \NeueCommerce\ActivityLogger\Models\ActivityLogger::class,

        /**
         * This is the name of the table that will be created the migration is ran
         * and also used by the default model that is shipped with the package.
         */

        'table_name' => env('ACTIVITY_LOGGER_TABLE_NAME', 'activity_logs'),

        /**
         * This is the database connection that will be used when the migration is ran
         * and also used by the default model that is shipped with the package.
         *
         * In the case this value is not defined, the config value
         * from "database.default" will be used instead.
         */

        'database_connection' => env('ACTIVITY_LOGGER_DB_CONNECTION'),
    ],

];
