<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\TagController;

// Events API
Route::apiResource('events', EventController::class);

// Tickets API
Route::apiResource('tickets', TicketController::class);

// Subscriptions API
Route::apiResource('subscriptions', SubscriptionController::class);

// Categories API
Route::apiResource('categories', CategoryController::class);

// Locations API
Route::apiResource('locations', LocationController::class);

// Tags API
Route::apiResource('tags', TagController::class);
