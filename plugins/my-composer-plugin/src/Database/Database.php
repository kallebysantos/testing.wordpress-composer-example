<?php

namespace MyComposerPlugin\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public static function connect()
    {
        /**
         * @global \wpdb $wpdb
         */
        global $wpdb;

        $capsule = new Capsule;

        error_log($wpdb->db_server_info());

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'charset' => $wpdb->charset ?: 'utf8mb4',
            'collation' => $wpdb->collate ?: 'utf8mb4_unicode_ci',
            'prefix' => $wpdb->prefix,
        ]);

        // Make the Capsule instance available globally via static methods
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM
        $capsule->bootEloquent();
        error_log('db connected');

        error_log($capsule->connection()->scalar('select 1'));
    }
}
