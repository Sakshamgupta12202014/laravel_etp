<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function result($marks){
        if($marks >= 90){
            return response("A", 200)->header("Content-Type", "text/plain");
        }
        else if($marks >= 75 && $marks <= 89) {
            return response("B", 200)->header("Content-Type", "text/plain");
        }
        else if($marks >= 50 && $marks<= 74) {
            return response("C", 200)->header("Content-Type", "text/plain");
        }else if($marks < 50 && $marks >= 0) {
            return response("Fail!!", 200)->header("Content-Type", "text/plain");
        }
        else{
            return response("Invalid marks", 200)->header("Content-Type", "text/plain");
        }
    }
}
