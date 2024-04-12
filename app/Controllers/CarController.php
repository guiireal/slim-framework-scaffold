<?php

namespace App\Controllers;

use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

readonly class CarController
{
    public function __construct(private PDO $pdo)
    {
    }

    public function index(ServerRequestInterface $_, ResponseInterface $response): ResponseInterface
    {
        $this->pdo->query('SELECT * FROM cars');
        $response->getBody()->write('{"message": "Hello, World!"}');

        return $response->withHeader('Content-Type', 'application/json');
    }
}