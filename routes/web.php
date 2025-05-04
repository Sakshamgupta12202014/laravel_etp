<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

// ✅ 3. Routing Parameters
// Use parameters to pass values in the URL.

Route::get('/user/{id}', function ($id) {
    return "User ID is " . $id;
});

// Optional parameter:
Route::get('/post/{id?}', function ($id = null) {
    return "Post ID is " . $id;
});


// ✅ 4. Understanding Views in Laravel
// Views are the HTML templates that Laravel shows.

// They are stored in: resources/views

// Example:

Route::get('/greet', function () {
    return view('greet');
});


// ✅ 5. Passing Data to Views
// You can pass variables to views.

Route::get('/greeting', function () {
    return view('greeting', ['name' => 'John']);
});


// ✅ 6. Sharing Data with All Views
// To share a value (like a website name) with every view, use View Composer or Service Provider.

// Simple example using AppServiceProvider:
// Open app/Providers/AppServiceProvider.php

// Add this inside boot():
// View::share('sitename', 'My Laravel App');




// ✅ 7. Laravel Response: Attaching Headers
// You can create custom responses with headers.

use Illuminate\Http\Response;

Route::get('/header', function () {
    return response('This is custom header response')->header('Content-Type', 'text/plain');
});


// sending html content through response and telling the browser about the response language using headers
Route::get('/html-response', function () {
    $html = '<h1>Hello from Laravel</h1><p>This is raw HTML.</p>';
    return response($html, 200)
        ->header('Content-Type', 'text/html');
});




// ✅ 8. Attaching Cookies
use Illuminate\Support\Facades\Cookie;

Route::get('/cookie', function () {
    return response('Hello with cookie')
        ->cookie('name', 'John', 60); // 60 minutes
});


// ✅ 9. JSON Response
// Laravel can return JSON easily (great for APIs):


    // This will:
    // Set the response body as JSON
    // Automatically add header: Content-Type: application/json
        
Route::get('/json', function () {
    return response()->json([
        'name' => 'John',
        'age' => 25
    ]);
});


// ✅ 10. Laravel Redirections
// You can redirect from one route to another:

Route::get('/home', function () {
    return redirect('dashboard');
});


Route::get('/dashboard', function() {
    return view('dashboard');
});



// ✅ 2. Passing Arrays and Objects
// You can pass complex data like arrays and objects too.

// ➕ Example: Passing an array

Route::get('/fruits', function(){
    $fruits = ['Apple', 'Banana', 'Mango'];
    return view('fruit-list', compact('fruits'));
});


// ➕ Example: Passing an object (like a Model)



Route::get('/profile', function(){
    $user = new App\Models\User();
    $user->name = 'John Doe';
    $user->email = 'john@example.com';
    
    return view('profile', compact('user'));
});


// ✅ 3. Nested Data / Associative Arrays

Route::get('/user-profile', function(){

    $data = [
        'user' => [
            'name' => 'Zainab',
            'email' => 'zainab@example.com'
        ]
    ];
    
    return view('user-profile', $data);
});


// named routes

Route::get('/about', function(){
    return response("this is about page")->header("Content-Type", "text/plain");
})->name('aboutpage');

