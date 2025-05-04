<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return "Welcome to dashboard";
    }
}
