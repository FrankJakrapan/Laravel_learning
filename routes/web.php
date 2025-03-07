<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function (){
    $title = 'Title';
    return view('about', compact('title'));
});

Route::get('/contact', function () {
    $name = 'Contact';
    $age = 20;
    $salary = 20000;

    return view('contact', compact('name', 'age', 'salary'));
});

Route::get('/profile', function () {
   return view('profile', ['name' => 'Frank', 'age' => 20]); 
});

Route::get('/params/{name}/{age}/{salary}', function ($name, $age, $salary) {
   return view('params', compact('name', 'age', 'salary')); 
});

Route::get('/form', function () {
   return view('form'); 
});

Route::post('/form', function (Request $request) {
    $name = $request->name;
    $email = $request->email;
    $password = $request->password;
    return json_encode(['name' => $name, 'email' => $email, 'password' => $password]);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/response', function () {
    return response()->json(["name" => "Frank", "age" => 20]);
});

Route::get('/products', function () {
    $products = [
        ['id' => 1, 'name' => 'Product 1', 'price' => 100],
        ['id' => 2, 'name' => 'Product 2', 'price' => 200],
        ['id' => 3, 'name' => 'Product 3', 'price' => 300],
    ];

    return response()->json($products);
});

Route::get('/response-type', function(){
    return response('Unauthorized', 401);
});

Route::get('redirect', function(){
    return redirect('/target');
});

Route::get('/target', function(){
    return 'Target Page';
});

$CustomerController = CustomerController::class;

Route::get('/customers', [$CustomerController, 'list']);
Route::get('/customers/{id}', [$CustomerController, 'detail']);
Route::post('/customers', [$CustomerController, 'create']);
Route::put('/customers/{id}', [$CustomerController, 'update']);
Route::delete('/customers/{id}', [$CustomerController, 'delete']);

