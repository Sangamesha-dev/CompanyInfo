<?php
namespace App;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
Route::get('/company/create', [CompanyController::class, 'showform']);
Route::post('/company/create', [CompanyController::class, 'create']);
Route::get('/companies/{id}', [CompanyController::class, 'viewCompany']);
Route::get('/companies/edit/{id}', [CompanyController::class, 'editCompanyForm']);
Route::post('/companies/edit', [CompanyController::class, 'editCompany']);
Route::delete('/companies/delete/{id}', [CompanyController::class, 'destroy']);
Route::get('/company/upload', function () {
    return view('companies_upload');
});

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
Route::get('/employee/create', [EmployeeController::class, 'employeeCreateForm']);
Route::post('/employee/create', [EmployeeController::class, 'create']);
Route::get('/employees/{id}', [EmployeeController::class, 'viewEmployee']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'editEmployeeForm']);
Route::post('/employee/edit', [EmployeeController::class, 'editEmployee']);
Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy']);
Route::post('/download/csv', [EmployeeController::class, 'downloadCsv']);
Route::get('/employee/upload', function () {
    return view('employees_upload');
});

// Route::get('/sendmail', function () {
//$job = (new ImportClass($fileImport))->delay(Carbon::now()->addSeconds(10));
//dispatch($job);
// });
