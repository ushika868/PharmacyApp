<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MedicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::apiResource('customers', CustomerController::class)->middleware('auth:sanctum');
//Route::apiResource('medications', MedicationController::class)->middleware('auth:sanctum');

// Get all customers
Route::get('customers', [CustomerController::class, 'index'])->middleware('auth:sanctum');

// Get a specific customer by ID
Route::get('customers/{customer}', [CustomerController::class, 'show'])->middleware('auth:sanctum');

// Create a new customer
Route::post('customers', [CustomerController::class, 'store'])->middleware('auth:sanctum','role:owner');

// Update an existing customer
Route::put('customers/{customer}', [CustomerController::class, 'update'])->middleware('auth:sanctum');

// Delete a customer
Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->middleware('auth:sanctum','role:owner,manager');;

// Permanent delete customer
Route::delete('customers/remove/{customer}', [CustomerController::class, 'remove'])->middleware('auth:sanctum','role:owner');;

// Get all medications
Route::get('medications', [MedicationController::class, 'index'])->middleware('auth:sanctum');

// Get a specific medication by ID
Route::get('medications/{medication}', [MedicationController::class, 'show'])->middleware('auth:sanctum');

// Create a new medication
Route::post('medications', [MedicationController::class, 'store'])->middleware('auth:sanctum','role:owner');

// Update an existing medication
Route::put('medications/{medication}', [MedicationController::class, 'update'])->middleware('auth:sanctum');

// Soft delete a medication
Route::delete('medications/{medication}', [MedicationController::class, 'destroy'])->middleware('auth:sanctum','role:owner,manager');

// Permanent delete a medication
Route::delete('medications/remove/{medication}', [MedicationController::class, 'remove'])->middleware('auth:sanctum','role:owner');


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
