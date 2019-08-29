<?php
declare(strict_types=1);

use DI\Container;
use PetStore\Application\Actions\Pet\ListOfPetsThatShouldBeInShowroomAction;
use PetStore\Application\Actions\Transaction\WeeklyRevenueReportAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;


return function (App $app, Container $container) {


    $app->group('/', function (Group $group) use ($container) {
        // Main page, a simple hello world
        $group->get('', function (Request $request, Response $response, $args) {
            $response->getBody()->write("Hello World!");
            return $response;
        });

        // route for weekly revenue report
        $group->get('weeklyRevenueReport', $container->make(WeeklyRevenueReportAction::class));

        // route for list of pets that should be in showroom
        $group->get('listOfPetsThatShouldBeInShowroom', $container->make(ListOfPetsThatShouldBeInShowroomAction::class));
    });


};