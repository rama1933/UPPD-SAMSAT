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

        Route::prefix('/pegawai')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indexpegawai'])->name('pegawai.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storepegawai'])->name('pegawai.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatepegawai'])->name('pegawai.update');
        });

        Route::prefix('/profile')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indexprofile'])->name('profile.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storeprofile'])->name('profile.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updateprofile'])->name('profile.update');
        });

        Route::prefix('/dealer')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indexdealer'])->name('dealer.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storedealer'])->name('dealer.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatedealer'])->name('dealer.update');
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
        Route::get('laporan', [App\Http\Controllers\PdfController::class, 'indexlaporanadmin'])->name('laporan.admin');
        Route::prefix('/pendaftaran')->group(function () {
            Route::get('/', [App\Http\Controllers\TrxPendaftaranController::class, 'indexpendaftaranadmin'])->name('pendaftaranadmin.index');
            Route::get('/data', [App\Http\Controllers\TrxPendaftaranController::class, 'data'])->name('pendaftaranadmin.data');
            Route::get('/show', [App\Http\Controllers\TrxPendaftaranController::class, 'showdata'])->name('pendaftaranadmin.show');
            Route::post('/update', [App\Http\Controllers\TrxPendaftaranController::class, 'updatependaftaran'])->name('pendaftaranadmin.update');

            Route::prefix('/selesai')->group(function () {
                Route::get('/', [App\Http\Controllers\TrxPendaftaranController::class, 'indexpendaftaranadminselesai'])->name('pendaftaranadminselesai.index');
            });

            Route::prefix('/kwitansi')->group(function () {
                Route::get('/', [App\Http\Controllers\TrxPendaftaranController::class, 'indexadminkwitansi'])->name('kwitansiadmin.index');
            });

            Route::prefix('/identitas')->group(function () {
                Route::get('/', [App\Http\Controllers\TrxPendaftaranController::class, 'indexpendaftaranadminidentitas'])->name('pendaftaranadminidentitas.index');
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
                Route::prefix('/harga')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexhargapdf'])->name('pdf.harga');
                });
                Route::prefix('/dealer')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexdealerpdf'])->name('pdf.dealer');
                });
                Route::prefix('/biodata')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexbiodatapdf'])->name('pdf.biodata');
                    Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexbiodatapdfdetail'])->name('pdf.biodatadetail');
                });
                Route::prefix('/pegawai')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpegawaipdf'])->name('pdf.pegawai');
                    Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpegawaipdfdetail'])->name('pdf.pegawaidetail');
                });

                Route::prefix('/profile')->group(function () {
                    Route::get('/', [App\Http\Controllers\PdfController::class, 'indexprofilepdf'])->name('pdf.profile');
                    Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexprofilepdfdetail'])->name('pdf.profiledetail');
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
                Route::get('/kwitansi/{id}', [App\Http\Controllers\PdfController::class, 'indextrxpendaftaranpdfkwitansi'])->name('pdf.trxpendaftarankwitansi');
                Route::get('/identitas', [App\Http\Controllers\PdfController::class, 'indextrxpendaftaranidentitaspdf'])->name('pdf.trxpendaftaranidentitas');
                Route::get('/detail/identitas/{id}', [App\Http\Controllers\PdfController::class, 'indextrxpendaftaranidentitaspdfdetail'])->name('pdf.trxpendaftaranidentitasdetail');
            });
        });
    });
});




Route::middleware('role:user')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'indexuser'])->name('home.user');
    Route::get('/show', [App\Http\Controllers\MasterController::class, 'showdata'])->name('dashboard.show');
    Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatedealer'])->name('dahsboard.update');
    Route::get('laporan', [App\Http\Controllers\PdfController::class, 'indexlaporanuser'])->name('laporan.user');

    Route::prefix('/pendaftaran')->group(function () {
        Route::get('/', [App\Http\Controllers\PendaftaranController::class, 'indexpendaftaran'])->name('pendaftaran.index');
        Route::get('/data', [App\Http\Controllers\PendaftaranController::class, 'data'])->name('pendaftaran.data');
        Route::get('/show', [App\Http\Controllers\PendaftaranController::class, 'showdata'])->name('pendaftaran.show');
        Route::post('/delete', [App\Http\Controllers\PendaftaranController::class, 'deletedata'])->name('pendaftaran.delete');
        Route::post('/update', [App\Http\Controllers\PendaftaranController::class, 'updatependaftaran'])->name('pendaftaran.update');
        Route::post('/store', [App\Http\Controllers\PendaftaranController::class, 'storependaftaran'])->name('pendaftaran.store');
        Route::post('/harga', [App\Http\Controllers\PendaftaranController::class, 'hargapendaftaran'])->name('pendaftaran.harga');
        Route::post('/filter', [App\Http\Controllers\UserController::class, 'filterdata'])->name('pendafraran.filter');
    });

    Route::prefix('/kwitansi')->group(function () {
        Route::get('/', [App\Http\Controllers\PendaftaranController::class, 'indexkwitansi'])->name('kwitansi.index');
    });

    Route::prefix('/pdf')->group(function () {

        Route::prefix('/user')->group(function () {
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexuserpdfdetail'])->name('pdf.userdetail');
        });

        Route::prefix('/pendaftaran')->group(function () {
            Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaranpdf'])->name('pdf.pendaftaran');
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaranpdfdetail'])->name('pdf.pendaftarandetail');
            Route::get('/kwitansi/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaranpdfkwitansi'])->name('pdf.pendaftarankwitansi');
        });
    });
});




// Route::get('user-page', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:user')->name('user.page');
Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
