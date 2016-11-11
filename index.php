<?php


require "vendor/autoload.php";

use Aura\Router\RouterContainer;

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->post( 'root', '/', function ( \Zend\Diactoros\ServerRequest $request ) {
    dump($request->getParsedBody()['number']);
} );

$matcher = $routerContainer->getMatcher();

$route = $matcher->match( $request );

$callable = $route->handler;
$response = $callable($request);
