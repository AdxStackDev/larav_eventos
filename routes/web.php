<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    $users = User::limit(5)->get(); 
    return response()->json($users);
});