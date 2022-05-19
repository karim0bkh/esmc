<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [\App\Http\Controllers\FrontpageController::class, 'index2'])->name('front_');


Route::get('/formations', [App\Http\Controllers\FormationsController::class,'index'])->name('formations');
Route::get('/formations/show={id}', [App\Http\Controllers\FormationsController::class,'show'])->name('formations_show');
Route::get('/diplomes', [App\Http\Controllers\DiplomesController::class,'index'])->name('diplomes');
Route::get('/diplomes/show={id}', [App\Http\Controllers\DiplomesController::class,'show'])->name('diplomes_show2');

Auth::routes(['verify' => true]);
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth' , 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/apply/{id}/{username}',  [App\Http\Controllers\FormationsController::class,'show2'])->name('apply');
    Route::get('/apply/dip/{id}/{username}',  [App\Http\Controllers\DiplomesController::class,'show3'])->name('apply2');
    Route::post('/application/{id}', [\App\Http\Controllers\ApplicationController::class, 'store'])->name('application');
    Route::post('/application/dip/{id}', [\App\Http\Controllers\ApplicationController::class, 'store2'])->name('application2');
    Route::get('/edit_user', [\App\Http\Controllers\UserController::class, 'edit1'])->name('edit_profile2');
    Route::patch('/edit_user/user/{id}', [\App\Http\Controllers\UserController::class, 'update1'])->name('edit_profile3');
    Route::get('/my-applications/{id}', [\App\Http\Controllers\ApplicationController::class, 'show2'])->name('my-applications1');
    Route::get('/my-applications/{id}/view', [\App\Http\Controllers\ApplicationController::class, 'show3'])->name('my-applications2');

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/formations/new', [App\Http\Controllers\FormationsController::class,'create'])->name('formations_new');
    Route::post('/formations/store', [App\Http\Controllers\FormationsController::class,'store'])->name('formations_store');
    Route::delete('/formations/delete/{id}', [App\Http\Controllers\FormationsController::class,'destroy'])->name('formations_delete');
    Route::get('/formations/list', [App\Http\Controllers\FormationsController::class,'index2'])->name('formations_show2');
    Route::get('/formations/edit/{id}', [App\Http\Controllers\FormationsController::class,'edit'])->name('formations.edit');
    Route::patch('/formations/update/{id}', [App\Http\Controllers\FormationsController::class,'update'])->name('formation.update');

    Route::get('/diplomes/new', [App\Http\Controllers\DiplomesController::class,'create'])->name('diplomes_new');
    Route::post('/diplomes/store', [App\Http\Controllers\DiplomesController::class,'store'])->name('diplomes_store');
    Route::delete('/diplomes/delete/{id}', [App\Http\Controllers\DiplomesController::class,'destroy'])->name('diplomes_delete');
    Route::get('/diplomes/list', [App\Http\Controllers\DiplomesController::class,'index2'])->name('diplomes_show');
    Route::get('/diplomes/edit/{id}', [App\Http\Controllers\DiplomesController::class,'edit'])->name('diplomes.edit');
    Route::patch('/diplomes/update/{id}', [App\Http\Controllers\DiplomesController::class,'update'])->name('diplomes.update');

    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin');
    Route::get('/list-users', [\App\Http\Controllers\UserController::class, 'index'])->name('list');
    Route::delete('/list-users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('students.destroy');
    Route::get('/edit_user/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('students.edit');
    Route::patch('/edit_user/{id}/', [\App\Http\Controllers\UserController::class, 'update'])->name('students.update');
    Route::get('/addmission', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('addmission');
    Route::get('/addmission/{id}', [\App\Http\Controllers\ApplicationController::class, 'show'])->name('addmission_view');
    Route::get('/front_page', [\App\Http\Controllers\FrontpageController::class, 'create'])->name('front_view');
    Route::get('/front_page/view', [\App\Http\Controllers\FrontpageController::class, 'index'])->name('front_view2');
    Route::delete('/front_page/delete/{id}', [\App\Http\Controllers\FrontpageController::class, 'destroy'])->name('front.destroy');
    Route::get('/front_page/edit/{id}', [\App\Http\Controllers\FrontpageController::class, 'edit'])->name('front.edit');
    Route::POST('/front_page/store', [\App\Http\Controllers\FrontpageController::class, 'store'])->name('front_view_add');
    Route::POST('/front_page/update/{id}', [\App\Http\Controllers\FrontpageController::class, 'update'])->name('front_view_update');
    Route::get('/accepter/{id}', [\App\Http\Controllers\ApplicationController::class, 'accept'])->name('accepter');
    Route::get('/refuser/{id}', [\App\Http\Controllers\ApplicationController::class, 'reject'])->name('refuser');
    Route::get('/accepter', [\App\Http\Controllers\ApplicationController::class, 'index1'])->name('list_accepter');
    Route::get('/refuser', [\App\Http\Controllers\ApplicationController::class, 'index2'])->name('list_refuser');
    Route::get('/addmission/accepter/{id}', [\App\Http\Controllers\ApplicationController::class, 'show'])->name('addmission_view_ac');
    Route::get('/addmission/refuser/{id}', [\App\Http\Controllers\ApplicationController::class, 'show'])->name('addmission_view_re');
    Route::get('/addmission/accepter/{id}/pdf', [\App\Http\Controllers\ApplicationController::class, 'downloadPDF'])->name('addmission_pdf');
    Route::get('/addmission/refuser/{id}/pdf', [\App\Http\Controllers\ApplicationController::class, 'downloadPDF'])->name('addmission_pdf');
    Route::get('/addmission/accepter/{id}/send-email', [\App\Http\Controllers\MailController::class, 'sendEmail_accept']);
    Route::get('/addmission/refuser/{id}/send-email', [\App\Http\Controllers\MailController::class, 'sendEmail_refuser']);

});




/*
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

*/
