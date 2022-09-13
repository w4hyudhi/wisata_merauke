<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users/store',[\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users/delete{id}',[\App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::get('users/view/{id}',[\App\Http\Controllers\UserController::class, 'show'])->name('users.view');
    Route::post('users/update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');




    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::group(['prefix' => 'wisata', 'as' => 'wisata.'], function () {
        Route::get('index', [\App\Http\Controllers\WisataController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\WisataController::class, 'create'])->name('create');
        Route::post('store',[\App\Http\Controllers\WisataController::class, 'store'])->name('store');
        Route::get('edit/{id}',[\App\Http\Controllers\WisataController::class, 'edit'])->name('edit');
        Route::get('view/{id}',[\App\Http\Controllers\WisataController::class, 'show'])->name('view');
        Route::post('update/{id}', [\App\Http\Controllers\WisataController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\WisataController::class, 'destroy'])->name('delete');
        Route::get('print/{id}',[\App\Http\Controllers\WisataController::class, 'print'])->name('print');
    });


    Route::group(['prefix' => 'fasilitas', 'as' => 'fasilitas.'], function () {

        Route::get('create', [\App\Http\Controllers\FasilitasController::class, 'create'])->name('create');
        Route::post('store/{id}',[\App\Http\Controllers\FasilitasController::class, 'store'])->name('store');
        Route::post('update/{id}',[\App\Http\Controllers\FasilitasController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\FasilitasController::class, 'destroy'])->name('delete');

    });

    Route::group(['prefix' => 'even', 'as' => 'even.'], function () {

        Route::get('create', [\App\Http\Controllers\EvenController::class, 'create'])->name('create');
        Route::post('store/{id}',[\App\Http\Controllers\EvenController::class, 'store'])->name('store');
        Route::post('update/{id}',[\App\Http\Controllers\EvenController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\EvenController::class, 'destroy'])->name('delete');

    });





    Route::group(['prefix' => 'usaha', 'as' => 'usaha.'], function () {
        Route::get('index', [\App\Http\Controllers\UsahaController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\UsahaController::class, 'create'])->name('create');
        Route::post('update/{id}',[\App\Http\Controllers\UsahaController::class, 'update'])->name('update');
        Route::post('store/{id}',[\App\Http\Controllers\UsahaController::class, 'store'])->name('store');
        Route::get('delete/{id}', [\App\Http\Controllers\UsahaController::class, 'destroy'])->name('delete');
        Route::post('laporan',[\App\Http\Controllers\UsahaController::class, 'laporan'])->name('laporan');

    });

    Route::group(['prefix' => 'pedagang', 'as' => 'pedagang.'], function () {
        Route::get('index', [\App\Http\Controllers\PedagangController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\PedagangController::class, 'create'])->name('create');
        Route::post('store',[\App\Http\Controllers\PedagangController::class, 'store'])->name('store');
        Route::get('edit/{id}',[\App\Http\Controllers\PedagangController::class, 'edit'])->name('edit');
        Route::get('view/{id}',[\App\Http\Controllers\PedagangController::class, 'show'])->name('view');
        Route::post('update/{id}', [\App\Http\Controllers\PedagangController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\PedagangController::class, 'destroy'])->name('delete');
        Route::get('print/{id}',[\App\Http\Controllers\PedagangController::class, 'print'])->name('print');
    });


    Route::group(['prefix' => 'keluarga', 'as' => 'keluarga.'], function () {
        Route::get('index', [\App\Http\Controllers\KeluargaController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\KeluargaController::class, 'create'])->name('create');
        Route::post('store',[\App\Http\Controllers\KeluargaController::class, 'store'])->name('store');
        Route::get('edit/{id}',[\App\Http\Controllers\KeluargaController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [\App\Http\Controllers\KeluargaController::class, 'update'])->name('update');
        Route::get('delete/{id}', [\App\Http\Controllers\KeluargaController::class, 'destroy'])->name('delete');
        Route::get('print/{id}',[\App\Http\Controllers\KeluargaController::class, 'print'])->name('print');
    });

});
