<?php

declare(strict_types=1);

if (file_exists(ROOT_PATH . '/vendor/autoload.php') === false) {
    echo "run this command first: composer install";
    exit();
}
require_once ROOT_PATH . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Silex\Application;

use IWD\JOBINTERVIEW\Server\Controller\SurveyController;

$app = new Application();
$app['debug'] = true;
ErrorHandler::register();
ExceptionHandler::register();

$base_route = 'api/';
$api_version = 'v1';

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
});
$app->get('/', function () use ($app) {
    return 'Server OK';
});

$app->get('/' . $base_route . $api_version . '/surveys', function () use ($app) {
    $controller = new SurveyController();
    $response = $controller->listSurvey();
    if ($response['code'] == 404)
        return new Response($response['content'], 404);

    return $response['content'];
});

$app->get('/' . $base_route . $api_version . '/surveys/{code}', function ($code) use ($app) {
    $controller = new SurveyController();
    $response = $controller->getSurvey($code);
    if ($response['code'] == 404)
        return new Response($response['content'], 404);

    return $response['content'];
});

$app->get('/' . $base_route . $api_version . '/surveys/{code}/aggregate', function ($code) use ($app) {
    $controller = new SurveyController();
    $response = $controller->getAggregatedSurvey($code);
    if ($response['code'] == 404)
        return new Response($response['content'], 404);

    return $response['content'];
});

$app->run();

return $app;
