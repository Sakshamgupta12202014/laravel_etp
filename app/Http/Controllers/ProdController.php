<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdController extends Controller
{
    
    // Simulated database (array)
    private $products = [
        1 => ['id' => 1, 'name' => 'Laptop'],
        2 => ['id' => 2, 'name' => 'Mobile'],
        3 => ['id' => 3, 'name' => 'Tablet'],
    ];

    // GET /products
    public function index()
    {
        return response()->json($this->products);
    }

    // GET /products/create
    public function create()
    {
        return "Form to create a product (Imagine a form here)";
    }

    // POST /products
    public function store(Request $request)
    {
        // Simulate adding product
        $newId = count($this->products) + 1;
        $this->products[$newId] = [
            'id' => $newId,
            'name' => $request->name
        ];

        return "Product '{$request->name}' created successfully!";
    }

    // GET /products/{id}
    public function show($id)
    {
        return $this->products[$id] ?? "Product not found.";
    }

    // GET /products/{id}/edit
    public function edit($id)
    {
        return "Form to edit product with ID $id (Imagine a form)";
    }

    // PUT/PATCH /products/{id}
    public function update(Request $request, $id)
    {
        if (!isset($this->products[$id])) {
            return "Product not found.";
        }

        $this->products[$id]['name'] = $request->name;

        return "Product ID $id updated to '{$request->name}'.";
    }

    // DELETE /products/{id}
    public function destroy($id)
    {
        if (!isset($this->products[$id])) {
            return "Product not found.";
        }

        unset($this->products[$id]);

        return "Product ID $id deleted.";
    }
}
