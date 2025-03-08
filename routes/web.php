<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackOfficeController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\ProductController;

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

//Route whith Controller User
Route::get('/users/list', [UserController::class, 'list']);
Route::get('/users/form', [UserController::class, 'form']);
Route::post('/users', [UserController::class, 'create']);
Route::get('/users/{id}', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/remove/{id}', [UserController::class, 'delete']);

//user singIn
Route::get('/user/signIn', [UserController::class, 'signIn']);
Route::post('/user/signInProcess', [UserController::class, 'signInProcess']);
Route::get('/user/signOut', [UserController::class, 'signOut'])->middleware(EnsureTokenIsValid::class);
Route::get('/user/info', [UserController::class, 'info'])->middleware(EnsureTokenIsValid::class);

//BackOffice
Route::get('/backOffice', [BackOfficeController::class, 'index'])->middleware(EnsureTokenIsValid::class);

//Product
Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/form', [ProductController::class, 'form']);
Route::post('/product', [ProductController::class, 'save']);
Route::get('/product/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::get('/product/remove/{id}', [ProductController::class, 'remove']);