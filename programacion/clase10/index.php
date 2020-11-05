<?php
//composer require slim/slim:"4.*"
//https://www.slimframework.com/docs/v4/start/installation.html
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/cuatrimestre3/Programacion3/programacion/clase10');

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});
$app->get('/users[/]', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});
$app->post('/users[/]', function (Request $request, Response $response, $args) {
    $headers = $request->getHeaders();
    $parsedBody = $request->getParsedBody();
    
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->group('/usuario',function(RouteCollectorProxy $group){
     $group->get('/{id}',function(Request $request, Response $response, $args){
         $body = json_encode(($args));
         $response->getBody()->write($body);
         return $response;
     });
     $group->post('/',function(Request $request, Response $response, $args){
         $response->getBody()->write("POST usuario");
         return $response;
     });
 });

$app->get('/users/{id}', function (Request $request, Response $response, $args) {
    $body = json_encode(($args));

    $response->getBody()->write($body);
    return $response;
});
$app->run();
