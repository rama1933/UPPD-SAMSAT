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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::post('/register', [App\Http\Controllers\UserController::class, 'storeuser'])->name('register.store');
Route::post('/filter', [App\Http\Controllers\UserController::class, 'filterdata'])->name('register.filter');

Route::middleware('role:admin')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.admin');

    Route::prefix('/master')->group(function () {
        Route::prefix('/data')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'data'])->name('master.data');
            Route::get('/show', [App\Http\Controllers\MasterController::class, 'showdata'])->name('master.show');
            Route::post('/delete', [App\Http\Controllers\MasterController::class, 'deletedata'])->name('master.delete');
        });

        Route::prefix('/jenis')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indexjenis'])->name('jenis.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storejenis'])->name('jenis.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatejenis'])->name('jenis.update');
        });

        Route::prefix('/merk')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indexmerk'])->name('merk.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storemerk'])->name('merk.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatemerk'])->name('merk.update');
        });

        Route::prefix('/tipe')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indextype'])->name('tipe.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storetype'])->name('tipe.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatetype'])->name('tipe.update');
        });

        Route::prefix('/biodata')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indexbiodata'])->name('biodata.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storebiodata'])->name('biodata.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatebiodata'])->name('biodata.update');
        });
    });

    Route::prefix('/user')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'indexuser'])->name('user.index');
        Route::get('/data', [App\Http\Controllers\UserController::class, 'data'])->name('user.data');
        Route::get('/show', [App\Http\Controllers\UserController::class, 'showdata'])->name('user.show');
        Route::post('/delete', [App\Http\Controllers\UserController::class, 'deletedata'])->name('user.delete');
        Route::post('/update', [App\Http\Controllers\UserController::class, 'updateuser'])->name('user.update');
        Route::post('/store', [App\Http\Controllers\UserController::class, 'storeuser'])->name('user.store');
        Route::post('/filter', [App\Http\Controllers\UserController::class, 'filterdata'])->name('user.filter');
    });
    Route::prefix('/admin')->group(function () {
        Route::prefix('/pendaftaran')->group(function () {
            Route::get('/', [App\Http\Controllers\TrxPendaftaranController::class, 'indexpendaftaranadmin'])->name('pendaftaranadmin.index');
            Route::get('/data', [App\Http\Controllers\TrxPendaftaranController::class, 'data'])->name('pendaftaranadmin.data');
            Route::get('/show', [App\Http\Controllers\TrxPendaftaranController::class, 'showdata'])->name('pendaftaranadmin.show');
            Route::post('/update', [App\Http\Controllers\TrxPendaftaranController::class, 'updatependaftaran'])->name('pendaftaranadmin.update');

            Route::prefix('/selesai')->group(function () {
                Route::get('/', [App\Http\Controllers\TrxPendaftaranController::class, 'indexpendaftaranadminselesai'])->name('pendaftaranadminselesai.index');
            });
        });

        Route::prefix('/pdf')->group(function () {
            Route::prefix('/master')->group(function () {
                Route::prefix('/jenis')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexjenispdf'])->name('pdf.jenis');
                });
                Route::prefix('/merk')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexmerkpdf'])->name('pdf.merk');
                });
                Route::prefix('/type')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indextypepdf'])->name('pdf.type');
                });
                Route::prefix('/biodata')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexbiodatapdf'])->name('pdf.biodata');
                    Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexbiodatapdfdetail'])->name('pdf.biodatadetail');
                });
            });
            Route::prefix('/user')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexuserpdf'])->name('pdf.user');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexuserpdfdetail'])->name('pdf.userdetail');
            });

            Route::prefix('/trxpendaftaran')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indextrxpendaftaranpdf'])->name('pdf.trxpendaftaran');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indextrxpendaftaranpdfdetail'])->name('pdf.trxpendaftarandetail');
                Route::get('/selesai', [App\Http\Controllers\PdfController::class, 'indextrxpendaftaranpdfselesai'])->name('pdf.trxpendaftaranselesai');
            });
        });
    });
});




Route::middleware('role:user')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'indexuser'])->name('home.user');
    Route::get('/show', [App\Http\Controllers\MasterController::class, 'showdata'])->name('dashboard.show');
    Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatebiodata'])->name('dahsboard.update');

    Route::prefix('/pendaftaran')->group(function () {
        Route::get('/', [App\Http\Controllers\PendaftaranController::class, 'indexpendaftaran'])->name('pendaftaran.index');
        Route::get('/data', [App\Http\Controllers\PendaftaranController::class, 'data'])->name('pendaftaran.data');
        Route::get('/show', [App\Http\Controllers\PendaftaranController::class, 'showdata'])->name('pendaftaran.show');
        Route::post('/delete', [App\Http\Controllers\PendaftaranController::class, 'deletedata'])->name('pendaftaran.delete');
        Route::post('/update', [App\Http\Controllers\PendaftaranController::class, 'updatependaftaran'])->name('pendaftaran.update');
        Route::post('/store', [App\Http\Controllers\PendaftaranController::class, 'storependaftaran'])->name('pendaftaran.store');
    });

    Route::prefix('/pdf')->group(function () {

        Route::prefix('/user')->group(function () {
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexuserpdfdetail'])->name('pdf.userdetail');
        });

        Route::prefix('/pendaftaran')->group(function () {
            Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaranpdf'])->name('pdf.pendaftaran');
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaranpdfdetail'])->name('pdf.pendaftarandetail');
        });
    });
});




// Route::get('user-page', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:user')->name('user.page');
Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
