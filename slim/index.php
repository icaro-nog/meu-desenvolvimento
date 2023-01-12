<?php 

    // Exija o autoloader do Composer em seu script PHP e você estará pronto para começar a usar o Slim
    require 'vendor/autoload.php';

    // Create and configure Slim app
    $config = ['settings' => [
        'addContentLengthHeader' => false,
    ]];
    $app = new \Slim\App($config);

    // Define app routes
    $app->get('/hello/{name}', function ($request, $response, $args) {
        return $response->write("Hello " . $args['name']);
    });

    // Run app
    $app->run();

?>