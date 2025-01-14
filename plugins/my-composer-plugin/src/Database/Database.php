<?php

namespace MyComposerPlugin\Database;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;


class Database
{
    /**
     * The current globally used instance.
     *
     * @var EntityManager
     */
    static $instance; 

    public static function entity_manager(){
        return static::$instance;
    }

    public static function connect()  {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__.'/Entities'],
            isDevMode: true,
        );

        $connection = DriverManager::getConnection([
            'driver' => 'pdo_mysql',
            'host' => DB_HOST,
            'dbname' => DB_NAME,
            'user' => DB_USER,
            'password' => DB_PASSWORD
        ]);

        $manager =  new EntityManager($connection, $config);
        static::$instance = $manager;

        return $manager;
    }
}
