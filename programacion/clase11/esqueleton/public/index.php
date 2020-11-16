<?php 
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Config\Database;
use App\Controllers\UsuarioController;
use App\Middlewares\JsonMiddleware;
use \Firebase\JWT\JWT;

require __DIR__.'/../vendor/autoload.php';

$conn = new Database;

$app = AppFactory::create();
$app->setBasePath('/cuatrimestre3/Programacion3/programacion/clase11/esqueleton/public');

$app->group('/usuario', function(RouteCollectorProxy $group){
    $group->get('[/]', UsuarioController::class . ":getAll");

    $group->post('[/]', UsuarioController::class . ":addOne");

    $group->get('/{id}', UsuarioController::class . ":getOne");

    $group->put('/{id}', UsuarioController::class . ":updateOne");

    $group->delete('/{id}', UsuarioController::class . ":deleteOne");
})->add(new JsonMiddleware);


$app->group('/login', function(RouteCollectorProxy $group){
    $group->post('[/]', UsuarioController::class . ":login");
});

$app->addBodyParsingMiddleware();
$app->run();