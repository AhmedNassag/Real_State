<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\AreaController;
use App\Http\Controllers\Dashboard\BranchController;




/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

/****************************** START ADMIN ROUTES ******************************/
Route::Group(['prefix' => 'admin', 'middleware' => ['auth','lang']], function () {
    Route::prefix('lang')->name('lang.')->group( function () {
        Route::controller(LangController::class)->group( function () {
            Route::get('/ar' ,  'ar')->name('ar');
            Route::get('/en' ,  'en')->name('en');
        });
    });



    Route::get('/home', [HomeController::class, 'index'])->name('home');




    //category
    Route::resource('category', CategoryController::class);
    Route::post('categoryDeleteSelected', [CategoryController::class, 'deleteSelected'])->name('category.deleteSelected');
    Route::get('categoryShowNotification/{id}/{notification_id}', [CategoryController::class, 'showNotification'])->name('category.showNotification');



    //product
    Route::resource('product', ProductController::class);
    Route::post('productDeleteSelected', [ProductController::class, 'deleteSelected'])->name('product.deleteSelected');
    Route::get('productShowNotification/{id}/{notification_id}', [ProductController::class, 'showNotification'])->name('product.showNotification');



    //country
    Route::resource('country', CountryController::class);
    Route::post('countryDeleteSelected', [CountryController::class, 'deleteSelected'])->name('country.deleteSelected');
    Route::get('countryShowNotification/{id}/{notification_id}', [CountryController::class, 'showNotification'])->name('country.showNotification');



    //city
    Route::resource('city', CityController::class);
    Route::post('cityDeleteSelected', [CityController::class, 'deleteSelected'])->name('city.deleteSelected');
    Route::get('cityShowNotification/{id}/{notification_id}', [CityController::class, 'showNotification'])->name('city.showNotification');



    //area
    Route::resource('area', AreaController::class);
    Route::post('areaDeleteSelected', [AreaController::class, 'deleteSelected'])->name('area.deleteSelected');
    Route::get('areaShowNotification/{id}/{notification_id}', [AreaController::class, 'showNotification'])->name('area.showNotification');



    //branch
    Route::resource('branch', BranchController::class);
    Route::post('branchDeleteSelected', [BranchController::class, 'deleteSelected'])->name('branch.deleteSelected');
    Route::get('branchShowNotification/{id}/{notification_id}', [BranchController::class, 'showNotification'])->name('branch.showNotification');



    //roles
    Route::resource('role', RoleController::class);
    Route::post('roleDelete', [RoleController::class, 'delete'])->name('role.delete');



    //user
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('userDeleteSelected', [UserController::class, 'deleteSelected'])->name('user.deleteSelected');
    Route::get('userShowNotification/{id}', [UserController::class, 'showNotification'])->name('user.showNotification');
    Route::get('userChangeStatus/{id}', [UserController::class, 'changeStatus'])->name('user.changeStatus');



    //general routes
    Route::get('show_file/{folder_name}/{photo_name}', [GeneralController::class, 'show_file'])->name('show_file');
    Route::get('download_file/{folder_name}/{photo_name}', [GeneralController::class, 'download_file'])->name('download_file');
    Route::get('allNotifications', [GeneralController::class, 'allNotifications'])->name('allNotifications');
    Route::get('markAllAsRead', [GeneralController::class, 'markAllAsRead'])->name('markAllAsRead');

});
/****************************** END ADMIN ROUTES ******************************/
