<?php

use App\Container\Container;
use App\Controllers\CarController;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container;

$container->set(
    id: CarController::class,
    callable: fn() => new CarController(
        pdo: new PDO('mysql:host=localhost;dbname=appcar', 'root', '150793')
    )
);

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->options('/{routes:.+}', function ($_, $response) {
    return $response;
});

$app->add(function (ServerRequestInterface $request, RequestHandlerInterface $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/', [CarController::class, 'index']);

$app->run();