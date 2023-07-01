<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResizeController;
use App\Http\Controllers\WelcomeCotroller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyLibraryController;
use App\Http\Controllers\CatalogHomeCotroller;
use App\Http\Controllers\PublishHomeCotroller;
use App\Http\Controllers\LibraryDiskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeCotroller::class, 'index'])->name('welcome');
Route::get('catalog', [CatalogHomeCotroller::class, 'index'])->name('catalog');
Route::get('detail/{book}', [CatalogHomeCotroller::class, 'detail'])->name('detail');
Route::get('publish', [PublishHomeCotroller::class, 'index'])->name('publish');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
    Route::resource('books', BookController::class);
    Route::get('/file-resize', [ResizeController::class, 'index']);
    Route::post('/resize-file', [ResizeController::class, 'resizeImage'])->name('resizeImage');

    Route::get('my-library', [MyLibraryController::class, 'MyLibrary'])->name('my-library');

    /* Payment Gateway PayPal Routes */
    Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });

    /* Route::get('/storage/library/{path}', LibraryDiskController::class); */

});

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    
});

require __DIR__.'/auth.php';
