<?php

use App\Http\Controllers\Sales\SalesTeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sales-team', SalesTeamController::class, [
    'index' => 'sales-team',
    'create' => 'sales-team.create',
    'store' => 'sales-team.store',
    'edit' => 'sales-team.edit',
    'update' => 'sales-team.update',
    'destroy' => 'sales-team.delete'
]);

Route::post('email-unique', [SalesTeamController::class, 'isEmailUnique'])->name('isUserEmailUnique');
Route::get('get-sales-team-data', [SalesTeamController::class, 'getSalesTeamData'])->name('get.sales.team.data');
Route::get('get-selected-sale-person-data', [SalesTeamController::class, 'getSelectedSalePersonData'])->name('get.selected.sale.person.data');
