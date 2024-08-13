<?php

namespace MiniMarkPlace\Controllers;

class ProductCategoryController
{
    private array $categories = [
        ['id' => 1, 'name' => 'Electronics'],
        ['id' => 2, 'name' => 'Books'],
    ];

    public function index(): array
    {
        return $this->categories;
    }

    public function store(string $name): string
    {
        $newId = count($this->categories) + 1;
        $newCategory = [
            'id' => $newId,
            'name' => $name,
        ];

        $this->categories[] = $newCategory;

        return "Category Added: {$newCategory['name']} (ID: {$newCategory['id']})";
    }

        // Jika ingin delete update nya terlihat di web 
    // public function handleRequest()
    // {
    //     $method = $_POST['_method'] ?? 'POST'; 

    //     switch ($method) {
    //         case 'POST':
    //             $this->store();
    //             break;
    //         case 'PUT':
    //             $id = $_POST['id'] ?? null;
    //             if ($id) {
    //                 $this->update($id);
    //             } else {
    //                 echo "Category ID is required for update.";
    //             }
    //             break;
    //         case 'DELETE':
    //             $id = $_POST['id'] ?? null;
    //             if ($id) {
    //                 $this->delete($id);
    //             } else {
    //                 echo "Category ID is required for delete.";
    //             }
    //             break;
    //         default:
    //             echo "Invalid method.";
    //             break;
    //     }
    // }
    
    public function show(int $id): string
    {
        foreach ($this->categories as $category) {
            if ($category['id'] === $id) {
                return "Category Found: {$category['name']} (ID: {$category['id']})";
            }
        }

        return "Category Not Found with ID: $id";
    }

    public function update(int $id, string $name): string
    {
        foreach ($this->categories as &$category) {
            if ($category['id'] === $id) {
                $category['name'] = $name;
                return "Category Updated: {$category['name']} (ID: {$category['id']})";
            }
        }

        return "Category Not Found with ID: $id";
    }

    public function delete(int $id): string
    {
        foreach ($this->categories as $key => $category) {
            if ($category['id'] === $id) {
                unset($this->categories[$key]);
                return "Category Deleted with ID: $id";
            }
        }

        return "Category Not Found with ID: $id";
    }
}
