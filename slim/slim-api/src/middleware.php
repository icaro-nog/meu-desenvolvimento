<?php
// Application middleware
//require '../../vendor/autoload.php';
$app = new Slim\App;

// e.g: $app->add(new \Slim\Csrf\Guard);
$app->add(new Tuupola\Middleware\JwtAuthentication([
    "header" => "X-Token",
    "regexp" => "/(.*)/",
    "path" => "/api", /* or ["/api", "/admin"] */
    "ignore" => ["/api/token"],
    "secret" => $container->get("settings")["secretKey"]
]));

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});