<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Basic GET Route
Route::get('/api/resource', 'ApiController@getResource');

// POST Route
Route::post('/api/resource', 'ApiController@createResource');

// PUT or PATCH Route
Route::put('/api/resource/{id}', 'ApiController@updateResource');

// DELETE Route
Route::delete('/api/resource/{id}', 'ApiController@deleteResource');

// Route with Parameters
Route::get('/api/users/{id}', 'UserController@show');

// Route Group with Middleware
Route::middleware(['auth:sanctum'])->group(function () {
    // Protected routes go here
    Route::get('/api/protected', 'ProtectedController@index');
    Route::post('/api/protected', 'ProtectedController@store');
});

// Resourceful Controller Routes
Route::resource('api/posts', 'PostController');

// Named Routes
Route::get('/api/users', 'UserController@index')->name('users.index');

// Route Prefixing
Route::prefix('api/v1')->group(function () {
    Route::get('/resource1', 'ApiController@resource1');
    Route::get('/resource2', 'ApiController@resource2');
});

// Route Middleware
Route::get('/api/sensitive', 'SensitiveController@index')->middleware('auth');

// Route Model Binding
Route::get('/api/posts/{post}', 'PostController@show');

// Group with Namespace
Route::namespace('Api')->group(function () {
    Route::get('/api/resource', 'ApiController@getResource');
});

// API Versioning
Route::prefix('v1')->group(function () {
    Route::get('/api/resource', 'ApiController@getResource');
});
