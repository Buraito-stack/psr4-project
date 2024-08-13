<?php

namespace MiniMarkPlace\Controllers;

class ProductCategoryController
{
    private $categories = [
        ['id' => 1, 'name' => 'Electronics'],
        ['id' => 2, 'name' => 'Books'],

    ];

    public function index()
    {
        return $this->categories;
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

    public function store()
    {
        $newId = count($this->categories) + 1;
        $newCategory = [
            'id' => $newId,
            'name' => $_POST['name'] ?? 'Unnamed Category',
        ];

        $this->categories[] = $newCategory;

        echo "Category Added: {$newCategory['name']} (ID: {$newCategory['id']})";
    }

    public function show($id)
    {
        foreach ($this->categories as $category) {
            if ($category['id'] == $id) {
                echo "Category Found: {$category['name']} (ID: {$category['id']})";
                return;
            }
        }

        echo "Category Not Found with ID: $id";
    }

    public function update($id)
    {
        foreach ($this->categories as &$category) {
            if ($category['id'] == $id) {
                $category['name'] = $_POST['name'] ?? $category['name'];
                echo "Category Updated: {$category['name']} (ID: {$category['id']})";
                return;
            }
        }

        echo "Category Not Found with ID: $id";
    }

    public function delete($id)
    {
        foreach ($this->categories as $key => $category) {
            if ($category['id'] == $id) {
                unset($this->categories[$key]);
                echo "Category Deleted with ID: $id";
                return;
            }
        }

        echo "Category Not Found with ID: $id";
    }
}
