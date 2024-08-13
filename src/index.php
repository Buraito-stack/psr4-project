<?php

require __DIR__.'/../vendor/autoload.php';

use MiniMarkPlace\Libraries\Routing;
use MiniMarkPlace\Controllers\ProductCategoryController;

$router = new Routing();

$router->add('GET', '/', function() {
    return 'Selamat datang di Web Kami!';
});

$router->add('GET', '/about', function() {
    return 'Web Kami adalah web Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
});

$router->add('GET', '/product-category', function() {
    include __DIR__ . '/views/product_category.php';
});

$router->add('GET', '/product-category/:id',[ProductCategoryController::class, 'show']);
$router->add('POST', '/product-category', [ProductCategoryController::class, 'store']);
$router->add('PUT', '/product-category/:id', [ProductCategoryController::class, 'update']);
$router->add('DELETE', '/product-category/:id', [ProductCategoryController::class, 'delete']);


// Jika ingin tershow di web wkwkwk
//$router->add('POST', '/product-category', function() {
//    $controller = new ProductCategoryController();
//    $controller->handleRequest();
//});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSR4-AUTOLOAD</title>
    <!-- Link CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">PSR4-AUTOLOAD</h1>
            <nav>
                <a href="/" class="px-3 py-2 hover:bg-blue-700 rounded">Home</a>
                <a href="/about" class="px-3 py-2 hover:bg-blue-700 rounded">About</a>
                <a href="/product-category" class="px-3 py-2 hover:bg-blue-700 rounded">Product Categories</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4">
        <?php echo $router->run(); ?>
    </main>
</body>
</html>
