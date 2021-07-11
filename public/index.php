<?php


require __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);

$router->map(
    'GET',
    '/',
    [
        'controller' => 'oShop\Controllers\MainController',
        'method' => 'home',
    ],
    'home'
);

// Mentions légales
$router->map(
    'GET',
    '/mentions-legales/',
    [
        'controller' => 'oShop\Controllers\MainController',
        'method' => 'legalNotice',
    ],
    'legal-notice'
);

// Notre route pour la categorie
$router->map(
    'GET',
    '/catalogue/categorie/[i:id]',
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'category',
    ],
    'category'
);

// Produits par type
$router->map(
    'GET',
    '/catalogue/type/[i:id]',
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'type',
    ],
    'type'
);

// Les produits par marque
$router->map(
    'GET',
    '/catalogue/marque/[i:id]',
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'brand',
    ],
    'brand'
);

// Page produit
$router->map(
    'GET',
    '/catalogue/produit/[i:id]',
    [
        'controller' => 'oShop\Controllers\CatalogController',
        'method' => 'product',
    ],
    'product'
);

// La requête du client correspond-elle à une route configurée dans AltoRouter
$match = $router->match();

// Si une route correspond
if ($match !== false) {
    $destination = $match['target'];
    $controllerName = $destination['controller'];
    $methodName = $destination['method'];
    $controller = new $controllerName();
    $controller->$methodName($match['params']); 
}
else {
    // On envoie une 404
    http_response_code(404);
    echo 'Page non trouvée.';
}