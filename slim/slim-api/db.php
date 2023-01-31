<?php
// Não permitir que script seja executado via browser
if (PHP_SAPI == 'apache2handler') {
    exit("Rodar via CLI");
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get("db");

$schema = $db->schema();
$tabela = "produtos";

$schema->dropIfExists( $tabela );

// Cria a tabela produtos
$schema->create($tabela, function($table){

    $table->increments("id");
    $table->string("titulo", 100);
    $table->text("descricao");
    $table->decimal("preco", 11, 2);
    $table->string("fabricante", 60);
    $table->date("dt_criacao");
});

// Populando tabela
$db->table($tabela)->insert([
    "titulo" => "Smartphone Motorola Moto G6 32GB Dual Chip",
    "descricao" => 'Android Oreo - 8.0 Tela 5.7" Octa-core 1.8 GHz 4G Câmera 12 + 5mp (Dual Traseira) - Índigo',
    "preco" => 899.00,
    "fabricante" => "Motorola",
    "dt_criacao" => "2019-10-22"
]);

$db->table($tabela)->insert([
    "titulo" => "Iphone X Cinza Espacial 64GB",
    "descricao" => 'Tela 5.8" IOS 12 4G Wi-Fi Câmera 12MP - Apple',
    "preco" => 4999.00,
    "fabricante" => "Apple",
    "dt_criacao" => "2019-10-22"
]);