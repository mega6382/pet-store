<?php
declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

/**
 * @return EntityManager
 */
function connection()
{
    $config = Setup::createYAMLMetadataConfiguration([__DIR__ . '/Entities'], true);

// database configuration parameters
    $conn = array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/db.sqlite',
    );

    try {
        $entityManager = EntityManager::create($conn, $config);
    } catch (\Doctrine\ORM\ORMException $e) {
        echo "Unable to connect to database";
        exit;
    }

    return $entityManager;
}