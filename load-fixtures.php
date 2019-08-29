<?php
declare(strict_types=1);

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

include 'app/bootstrap.php';

$loader = new Loader();
$loader->loadFromDirectory('app/Seeds');
$fixtures = $loader->getFixtures();

$purger = new ORMPurger();
$entityManager = connection();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($fixtures);