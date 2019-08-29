<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
include 'database.php';

use DI\ContainerBuilder;
use Slim\App;
use Slim\Factory\AppFactory;

/**
 * @return App
 * @throws Exception
 */
function bootstrap()
{
    $app = AppFactory::create();

    $app->addErrorMiddleware(true, true, true);

    // Get the EntityManager for our database
    $entityManager = connection();

    // The IOC container builder
    $builder = new ContainerBuilder();

    // Our Repositories
    $repositories = include 'repositories.php';
    $repositories($builder, $entityManager);

    // Our other dependencies
    $dependencies = include 'dependencies.php';
    $dependencies($builder);

    // Our IOC Container
    $container = $builder->build();

    //Our routes
    $routes = include 'routes.php';
    $routes($app, $container);

    return $app;

}