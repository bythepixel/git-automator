<?php

require "vendor/autoload.php";

use ByThePixel\Controllers\PullRequestController;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Zend\Diactoros\Response;

$dotenv = new Dotenv\Dotenv( __DIR__ );
$dotenv->load();

$container = new League\Container\Container;
$container->share('PullRequestController', PullRequestController::class);
$container->share( 'Response', Response::class );
$container->share('Log', function() {
    $log = new Logger( ' name' );
    $log->pushHandler( new StreamHandler( '/srv/logs/git-websockets.log', Logger::NOTICE ) );
});
$container->share( 'emitter', \Zend\Diactoros\Response\SapiEmitter::class );

// create a log channel

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// Routes
// @todo move routes into autoloaded routes.php file
$route = new \League\Route\RouteCollection($container);

// @todo create tests to mock api requests
$route->post('/pullrequest', [ $container->get( 'PullRequestController' ), 'create']);

$response = $route->dispatch($request, $container->get('Response'));
$container->get('emitter')->emit($response);
