<?php

use MiniMarkPlace\Controllers\ProductCategoryController;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Product Categories</h1>

<!-- Add Category Form -->
<form action="/product-category" method="POST" class="mb-6">
    <input type="hidden" name="_method" value="POST">
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Add Category</button>
</form>

<!-- Update Category Form -->
<form action="/product-category" method="POST" class="mb-6">
    <input type="hidden" name="_method" value="PUT">
    <div class="mb-4">
        <label for="updateId" class="block text-sm font-medium text-gray-700">Category ID</label>
        <input type="text" name="id" id="updateId" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>
    <div class="mb-4">
        <label for="updateName" class="block text-sm font-medium text-gray-700">New Category Name</label>
        <input type="text" name="name" id="updateName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Category</button>
</form>

<!-- Delete Category Form -->
<form action="/product-category" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <div class="mb-4">
        <label for="deleteId" class="block text-sm font-medium text-gray-700">Category ID</label>
        <input type="text" name="id" id="deleteId" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete Category</button>
</form>

    <!-- Display Categories -->
    <h2 class="text-xl font-semibold mt-8 mb-4">Categories</h2>
    <ul class="list-disc pl-5">
        <?php
        $controller = new ProductCategoryController();
        $categories = $controller->index(); 

        foreach ($categories as $category) {
            echo "<li>" . htmlspecialchars($category['name']) . " (ID: {$category['id']})</li>";
        }
        ?>
    </ul>
</div>

</body>
</html>
