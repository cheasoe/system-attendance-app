<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;


use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;

Route::get('/customers/export', [
    AttendanceController::class,
    'ExportCustomers'
])->name('customers.export');


Route::get('/list', [UserController::class, 'List'])->name('list');

Route::get('/',              [UserController::class, 'Login'])->name('login');
Route::post('/login-submit', [UserController::class, 'LoginSubmit']);
Route::get('/update-password', [UserController::class, 'updatePassword']);

Route::post('/logout',              [UserController::class, 'Logout'])->name('logout');

Route::get('/register',              [UserController::class, 'Register'])->name('register');
Route::post('/register-submit', [UserController::class, 'RegisterSubmit'])->name('register-submit');

// (Admin Routes) 
Route::middleware(['auth', 'role:1'])->group(function () {

    Route::get('/dashboard', [AttendanceController::class, 'Dashboard'])->name('dashboard');
    Route::get('/viewcoustomer', [AttendanceController::class, 'ViewCoustomer'])->name('viewcoustomer');
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::put('/admin/users/{id}/update-role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');

    Route::get('/list', [UserController::class, 'List'])->name('list');
});


// (Staff Routes) 
Route::middleware(['auth', 'role:2'])->group(function () {
   
    Route::get('/dashboard', [AttendanceController::class, 'Dashboard'])->name('dashboard');
    
    Route::get('/viewcoustomer', [AttendanceController::class, 'ViewCoustomer'])->name('viewcoustomer');

    Route::post('/addcoustomer', [AttendanceController::class, 'AddcoustomerSubmit'])->name('addcoustomer');
    Route::post('/addcoustomer-submit', [AttendanceController::class, 'AddcoustomerSubmit'])->name('addcoustomer-submit');

    Route::get('/updatecoustomer/{idupdate}', [AttendanceController::class, 'UdateCoustomer'])->name('updatecoustomer');
    Route::post('/updatecoustomer-submit', [AttendanceController::class, 'UdateCoustomerSubmit'])->name('updatecoustomer-submit');

    Route::delete('/deleted/{id_dele}', [AttendanceController::class, 'DeleteCustomer'])->name('deleted');
    Route::get('/export-customers', [AttendanceController::class, 'ExportCustomers'])->name('export.customers');
});





Route::middleware(['auth', 'role:1,2'])->group(function () {

    Route::get('/dashboard', [AttendanceController::class, 'Dashboard'])->name('dashboard');
    Route::get('/viewcoustomer', [AttendanceController::class, 'ViewCoustomer'])->name('viewcoustomer');


    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});