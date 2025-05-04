<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id) {

        $products = [
            1 => "Apple",
            2 => "Banana",
            3 => "Kiwi",
            4 => "peach"
        ];

        if(array_key_exists($id, $products)){
            return response("Product is : " . $products[$id])->header("Content-Type", "text/plain");
        }
        else{
            return "Product with the product id is not found";
        }
    }

    // ✅ 3. Optional Parameters with Default Values
    public function greet($name = "Guest") {
        // agar guest ki value hogi toh woh show kr do else default show kr do
        return response("Hello, ".$name, 200)->header("Content-Type", "text/plain");
    }


//  What If There Are Multiple Parameters?
    public function placeOrder($user, $product){
        return "User: $user ordered Product: $product";
    }

}
