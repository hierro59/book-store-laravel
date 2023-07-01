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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [WelcomeCotroller::class, 'index'])->name('welcome');
Route::get('catalog', [CatalogHomeCotroller::class, 'index'])->name('catalog');
Route::get('detail/{book}', [CatalogHomeCotroller::class, 'detail'])->name('detail');
Route::get('publish', [PublishHomeCotroller::class, 'index'])->name('publish');

try {
    Route::get('storage/app/public/library', function () {
       
            $file = file_exists('storage/app/public/library/GYMY7PIUmLSlQgoh9mst8D4Neco5wshhMwLs44b5.pdf');
            return $file;
       
    });
} catch (Exception $e) {
    logger($e);
}


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

    Route::get('/storage/library/{path}', LibraryDiskController::class);

    /* Route::get('/storage/books', function () {
        
    })->middleware(['auth', 'verified']); */
});

Route::group(['middleware' => ['role:super-admin']], function () {
    //Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    
});



/* Route::group(['middleware' => ['role:super-admin|autor']], function () {
    //Route::resource('books', BookController::class);
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books.create', [BookController::class, 'create'])->name('books.create');
    Route::post('books.edit', [BookController::class, 'edit'])->name('books.edit');
    Route::post('books.show', [BookController::class, 'show'])->name('books.show');
    Route::post('books.store', [BookController::class, 'store'])->name('books.store');
    
}); */

/* Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    }); */

require __DIR__.'/auth.php';
