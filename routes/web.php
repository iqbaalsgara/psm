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

// Route::post('/logout', 'LoginController@logout')->name('logout');

// Route::get('/', function () {
//    return view('auth.register');
// });

//Account Route
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');   
});

Route::get('/', "DashboardController@dashboard")->middleware(['auth','statusCheck']);

//Account Route
Route::group(['middleware' => ['auth','statusCheck','roleSuperAdmin']], function () {
    Route::get('/user', "UserController@index");
    Route::post('/user/create', "UserController@create");
    Route::get('/user/{id}', 'UserController@show');
    Route::get('/user/{id}/status','UserController@status');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::post('/user/{id}/delete', 'UserController@delete');    
});

//Customer Routes
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/customer', 'CustomerController@index');
    Route::post('/customer/create', 'CustomerController@create');
    Route::post('/customer/update', 'CustomerController@update');
    Route::post('/customer/{id}/delete', 'CustomerController@delete');
    Route::get('/customer/{id}', 'CustomerController@show');
    Route::get('/customer/{id}/detail','CustomerController@detail');
    Route::get('/customer/{id}/detail/all','CustomerController@detailAll');
    Route::get('/customer/{id}/detail/{id2}','CustomerController@detailShow');
    Route::post('/customer/{id}/detail/create', 'CustomerController@detailCreate');
    Route::post('/customer/{id}/detail/{id2}/update', 'CustomerController@detailUpdate');
    Route::post('/customer/{id}/detail/{id2}/delete', 'CustomerController@detailDelete');
    // Route::get('/customer/getProvinsi', 'CustomerController@getProvinsi');
    // Route::get('/customer/getKota/{id}', 'CustomerController@getKota');
    // Route::get('/customer/getKecamatan/{id}', 'CustomerController@getKecamatan');
});


//Perusahaan Routes
Route::group(['middleware' => ['auth','statusCheck','roleOperator','roleSuperAdmin']], function() {
    Route::get('/perusahaan', 'PerusahaanController@index');
    Route::get('/perusahaan/{id}', 'PerusahaanController@show');
    Route::post('/perusahaan/create', 'PerusahaanController@create');
    Route::post('/perusahaan/update', 'PerusahaanController@update');
    Route::post('/perusahaan/{id}/delete', 'PerusahaanController@delete');
});

//surat jalan Routes
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/surat_jalan', 'SuratJalanController@index');
    Route::get('/surat_jalan/{id}/perusahaan', 'SuratJalanController@perusahaan');
    Route::get('/surat_jalan/{id}/perusahaan/{id2}', 'SuratJalanController@show');
    Route::post('/surat_jalan/{id}/perusahaan/create', 'SuratJalanController@create');
    Route::post('/surat_jalan/{id}/perusahaan/update', 'SuratJalanController@update');
    Route::post('/surat_jalan/{id}/perusahaan/{id2}/delete', 'SuratJalanController@delete');
    Route::get('/surat_jalan/{id}/customer/{id2}', 'SuratJalanController@customer');
    Route::post('/surat_jalan/{id}/perusahaan/{id2}/check', 'SuratJalanController@check');
    Route::post('/surat_jalan/{id}/perusahaan/{id2}/arsip', 'SuratJalanController@arsip');
    Route::post('/surat_jalan/{id}/perusahaan/{id2}/invoice', 'SuratJalanController@invoice');
    Route::get('/surat_jalan/{id}/perusahaan/{id2}/print', 'SuratJalanController@print');
    Route::get('/surat_jalan/{id}/perusahaan/{id2}/printInvoice', 'SuratJalanController@printInvoice');
    Route::get('/surat_jalan/{id}/detail', 'SuratJalanController@detail');
    Route::get('/surat_jalan/{id}/detail/{id2}', 'SuratJalanController@detailShow');
    Route::get('/surat_jalan/{id}/detailAll', 'SuratJalanController@detailAll');
    Route::post('/surat_jalan/{id}/detail/create', 'SuratJalanController@detailCreate');
    Route::post('/surat_jalan/{id}/detail/update', 'SuratJalanController@detailUpdate');
    Route::post('/surat_jalan/{id}/detail/{id2}/delete', 'SuratJalanController@detailDelete');
    Route::get('/surat_jalan/{id}/fillter/{param1}/{param2}', 'SuratJalanController@fillter');
    Route::get('/surat_jalan/autocomplete', 'SuratJalanController@autocomplete');
    // Route::get('/surat_jalan/{id}/fillter/{param}/{param2}', 'SuratJalanController@fillter');

    //jadwal pengiriman
    Route::get('/surat_jalan/{id}/jadwal/{id2}', 'SuratJalanController@jadwal');
    Route::post('/surat_jalan/{id}/buat_jadwal', 'SuratJalanController@buat_jadwal');
    
    //arsip
    Route::get('/arsip', 'SuratJalanController@arsipIndex');
    Route::get('/arsip/{id}/year', 'SuratJalanController@arsipIndexYear');
    Route::get('/arsip/{id}/{year}/month', 'SuratJalanController@arsipIndexMonth');
    Route::get('/arsip/{id}/{year}/{month}/sj', 'SuratJalanController@arsipIndexAll');
    Route::post('/arsip/kembalikan', 'SuratJalanController@arsipKembalikan');

});


//Pembelian Routes
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/pembelian', 'PembelianController@index');
    Route::get('/pembelian/{id}', 'PembelianController@show');
    Route::post('/pembelian/{id}/satuan', 'PembelianController@satuan');
    Route::post('/pembelian/{id}/selesai', 'PembelianController@selesai');
});

//Pembukuan Routes
Route::group(['middleware' => ['auth', 'roleSuperAdmin']], function () {
    Route::get('/pembukuan', 'PembukuanController@index');
    Route::get('/pembukuan/{id}', 'PembukuanController@tampil');
    Route::post('/pembukuan/{id}/satuan', 'PembukuanController@satuan');
    Route::post('/pembukuan/selesai', 'PembukuanController@selesai');
    Route::get('/pembukuan/search/autocomplete', 'PembukuanController@autocomplete');
    Route::get('/pembukuan/cari/data', 'PembukuanController@search');
    Route::get('/exportpembukuan','PembukuanController@pembukuanexport')->name('exportpembukuan');
    Route::post('/importpembukuan','PembukuanController@pembukuanimportexcel')->name('importpembukuan');
});


//pengiriman Routes
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/pengiriman', 'PengirimanController@index');
    Route::get('/pengiriman/{id}', 'PengirimanController@show');
    Route::post('/pengiriman/{id}/satuan', 'PengirimanController@satuan');
    Route::get('/pengiriman/{id}/kirim', 'PengirimanController@kirim');
    Route::get('/pengiriman/{id}/hapus', 'PengirimanController@hapus');
});

//penawaran Routes
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/penawaran', 'PenawaranController@index');
    Route::get('/penawaran/{id}', 'PenawaranController@show');
    Route::get('/penawaran/cari/{pt}/{barang}', 'PenawaranController@cari');
    Route::post('/penawaran/create', 'PenawaranController@create');
    Route::post('/penawaran/{id}/update', 'PenawaranController@update');
    Route::post('/penawaran/{id}/delete', 'PenawaranController@delete');
    Route::get('/penawaran/{id}/print', 'PenawaranController@print');
    Route::get('/penawaran/{id}/detailAll', 'PenawaranController@detailAll');
    Route::get('/penawaran/{id}/detail', 'PenawaranController@detail');
    Route::get('/penawaran/{id}/perusahaan', 'PenawaranController@perusahaan');
    Route::get('/penawaran/{id}/detailShow', 'PenawaranController@detailShow');
    Route::post('/penawaran/{id}/detail/create', 'PenawaranController@detailCreate');
    Route::post('/penawaran/{id}/detail/update', 'PenawaranController@detailUpdate');
    Route::post('/penawaran/{id}/detail/{id2}/delete', 'PenawaranController@detailDelete');
    Route::get('/penawaran/search/autocomplete', 'PenawaranController@autocomplete');
});

//account
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/account/settings', 'AccountController@settings');
    Route::post('/account/save', 'AccountController@simpan');
});

//account
Route::group(['middleware' => ['auth', 'roleOffice']], function () {
    Route::get('/report', 'ReportController@index');
    Route::post('/report/tarik_data', 'ReportController@tarik_data');
});

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Auth::routes();
});

Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

