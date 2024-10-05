<?php

use App\Http\Controllers\ChartOfAccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UominfoController;
use App\Http\Controllers\SupplierClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HsController;
use App\Models\ChartOfAccount;

use Illuminate\Support\Facades\Log;


// Public routes
Route::get('/', [LoginController::class, 'index'])->name('/'); // Home page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('/loginn', [LoginController::class, 'loginn'])->name('loginn');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// user



Route::get('/create-user', [UserController::class, 'showCreateUserForm'])->name('create.user.form');

Route::post('/create-user', [UserController::class, 'store'])->name(name: 'create.user');

// Route to show the edit form for a user
Route::get('/edit-user/{apps_user}', [UserController::class, 'edit'])->name('edit.user');
Route::put('/update-user/{apps_user}', [UserController::class, 'update'])->name('update.user');
// Route to delete a user
Route::delete('/delete-user/{apps_user}', [UserController::class, 'destroy'])->name('delete.user');


// Chart Of Account

Route::get('/chart-add', [ChartOfAccountController::class, 'index'])->name('create.chart.form');
Route::post('/chart-add', [ChartOfAccountController::class, 'store'])->name('create.chart');
Route::get('/edit-chart/{id}', [ChartOfAccountController::class, 'edit'])->name('edit.chart');
Route::put('/update-chart/{id}', [ChartOfAccountController::class, 'update'])->name('update.chart');
Route::delete('/delete-chart/{id}', [ChartOfAccountController::class, 'destroy'])->name('delete.chart');



Route::get('/hs-add', [HsController::class, 'index'])->name(name: 'create.hs.form');
Route::post('/hs-add', [HsController::class, 'store'])->name('create.hs');
Route::get('/edit-chart/{id}', [HsController::class, 'edit'])->name('edit.chart');
Route::put('/update-chart/{id}', [HsController::class, 'update'])->name('update.chart');
Route::delete('/delete-chart/{id}', [HsController::class, 'destroy'])->name('delete.chart');








// role

Route::get('/create-role', [DesignationController::class, 'index'])->name('create.role.form');

Route::post('/create-role', [DesignationController::class, 'store'])->name(name: 'create.role');
Route::delete('/designation-info/{desig_code}/delete', [DesignationController::class, 'destroy'])->name('role.destroy');
Route::get('/designation-info/{desig_code}/edit', [DesignationController::class, 'edit'])->name('designation.edit');
Route::post('/designation-info/{desig_code}/update', [DesignationController::class, 'update'])->name('designation.update');










// employe
Route::get('/employeeinfo', [EmployeeController::class, 'index'])->name('employe.info');

Route::get('/create_employee', [EmployeeController::class, 'create'])->name('employe.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employe.store');
Route::get('/employees/index', [EmployeeController::class, 'index'])->name('employe.index');
Route::get('/employe/edit/{emp_code}', [EmployeeController::class, 'edit'])->name('employe.edit');
Route::delete('/employe/delete/{emp_code}', [EmployeeController::class, 'destroy'])->name('employe.destroy');
Route::put('/employe/update/{emp_code}', [EmployeeController::class, 'update'])->name('employe.update');




// Protected routes
// Route::get('dashboard', function () {
//     return view('dashboard'); // Adjust to your dashboard view
// })->middleware('auth')->name('dashboard');

Route::get('dashboard', function () {
    return view('index'); // Ensure this matches your view file name and path
})->middleware('auth')->name('dashboard');




    Route::get('/company-info/create', [CompanyInformationController::class, 'create'])->name('com.create');
    Route::post('/company-info/store', [CompanyInformationController::class, 'store'])->name('com.store');
    Route::get('/company-info/index', [CompanyInformationController::class, 'index'])->name('com.index');
    Route::get('/company/{company_code}/edit', [CompanyInformationController::class, 'edit'])->name('com.edit');
    Route::put('/company/{company_code}', [CompanyInformationController::class, 'update'])->name('com.update');
    Route::delete('/company-info/{company_code}/delete', [CompanyInformationController::class, 'destroy'])->name('com.destroy');


    Route::get('/uominfo/create', [UominfoController::class, 'create'])->name('uom.create');
    // Route::post('/uominfo/store', [UominfoController::class, 'store'])->name('uom.store');

    Route::post('/uominfo/store', [UominfoController::class, 'store'])->middleware('auth')->name('uom.store');

    Route::get('/uominfo/index', [UominfoController::class, 'index'])->name('uom.index');
    Route::get('/uominfo/{id}/edit', [UominfoController::class, 'edit'])->name('uom.edit');
    Route::put('/uominfo/{id}/update', [UominfoController::class, 'update'])->name('uom.update');
    Route::delete('/uominfo/{id}/delete', [UominfoController::class, 'destroy'])->name('uom.destroy');

    Route::get('/client-supplier/create', [SupplierClientController::class, 'create'])->name('c&s.create');
    Route::post('/client-supplier/store', [SupplierClientController::class, 'store'])->name('c&s.store');
    Route::get('/client-supplier/index', [SupplierClientController::class, 'index'])->name('c&s.index');
    Route::get('/client-supplier/{id}/edit', [SupplierClientController::class, 'edit'])->name('c&s.edit');
    Route::put('/client-supplier/{id}/update', [SupplierClientController::class, 'update'])->name('c&s.update');
    Route::delete('/client-supplier/{id}/delete', [SupplierClientController::class, 'destroy'])->name('c&s.destroy');

// Location



// Route::get(uri: '/location/create', [LocationController::class, 'create'])->name('location.create');
Route::get('/uominfo/{id}/edit', [UominfoController::class, 'edit'])->name('uom.edit');
Route::put('/uominfo/{id}/update', [UominfoController::class, 'update'])->name('uom.update');
Route::delete('/uominfo/{id}/delete', [UominfoController::class, 'destroy'])->name('uom.destroy');

Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');















Route::get('/test-session', function () {
    session(['test_key' => 'test_value']);
    return 'Session value set: ' . session('test_key');
});

// Route::get('/test-auth', function () {
//     return Auth::check() ? 'Authenticated' : 'Not Authenticated';
// });
Route::get('/check-auth', function () {
    return Auth::check() ? 'Authenticated' : 'Not Authenticated';
})->middleware('auth');




Route::get('/debug-auth', function () {
    return response()->json([
        'user' => Auth::user(),
        'id' => Auth::id(),
        'check' => Auth::check(),
    ]);
});
