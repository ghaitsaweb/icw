<?php

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

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Route::resource('akun', 'AkunController');
Route::resource('masterflow', 'MasterflowController');
Route::resource('report', 'ReportController');
Route::post('showtujuan', 'AkunController@showtujuan')->name('akun.showtujuan'); 
Route::post('detail', 'AkunController@detail')->name('akun.detail'); 
Route::resource('adjust', 'AdjustmentController');
Route::post('approve', 'AdjustmentController@approve')->name('adjust.approve');  
Route::post('approve2', 'AdjustmentController@approve2')->name('adjust.approve2');  
Route::post('insertbanyak', 'AdjustmentController@insertbanyak')->name('adjust.insertbanyak'); 
Route::post('hapus', 'AdjustmentController@hapus')->name('adjust.hapus');   
Route::post('showadj', 'AdjustmentController@showadj')->name('adjust.showadj');  
Route::post('reject', 'AdjustmentController@reject')->name('adjust.reject');
Route::post('buat', 'AkunController@buat')->name('akun.buat'); 
Route::post('upload', 'AdjustmentController@upload')->name('adjust.upload');  
Route::get('/akun/detailkartu/{id}', 'AkunController@detail');
Route::post('qtyout', 'AkunController@qtyout')->name('akun.qtyout'); 
Route::post('qtyin', 'AkunController@qtyin')->name('akun.qtyin'); 
Route::post('details', 'AkunController@details')->name('akun.details'); 
Route::post('posts', 'AkunController@posts')->name('akun.posts'); 


Route::resource('dashboard', 'DashboardController');
Route::get('/dashboard/detail/{id}', 'DashboardController@detail');
Route::get('/dashboard/detail2/{id}', 'DashboardController@detail2');
Route::get('/dashboard/detail3/{id}', 'DashboardController@detail3');



Route::get('getcount', 'HomeController@getcount');
Route::get('getcountchiefstore', 'HomeController@getcountchiefstore');
Route::get('getcountrnd', 'HomeController@getcountrnd');
Route::get('getcountinfra', 'HomeController@getcountinfra');
Auth::routes();
Route::group(['middleware' => ['user']], function () {
    Route::get('user/{id}/close', 'UserController@close')->name('user.close');
    Route::get('user/{id}/send', 'UserController@send')->name('user.send');
    Route::get('user/{id}/reopen', 'UserController@reopen')->name('user.reopen');
    //
    // Route::get('image-upload', 'UserController@imageUpload')->name('image.upload');
    // Route::post('image-upload', 'UserController@imageUploadPost')->name('image.upload.post');
});

Route::group(['middleware' => ['chiefstore']], function () {
    Route::post('chiefstore/chartpenyebab', 'ChiefstoreController@chartpenyebab')->name('chiefstore.chartpenyebab');
    Route::post('chiefstore/chartakibat', 'ChiefstoreController@chartakibat')->name('chiefstore.chartakibat');
    Route::post('chiefstore/getpercabang', 'ChiefstoreController@getpercabang')->name('chiefstore.getcabang');
    Route::get('chiefstore/open', 'ChiefstoreController@open')->name('chiefstore.open');
    Route::get('chiefstore/approve', 'ChiefstoreController@approveshow')->name('chiefstore.approveshow');
    Route::get('chiefstore/reject', 'ChiefstoreController@rejectedshow')->name('chiefstore.rejectedshow');
    Route::get('chiefstore/close', 'ChiefstoreController@close')->name('chiefstore.close');
    Route::resource('chiefstore', 'ChiefstoreController');
    Route::get('chiefstore/{id}/approve', 'ChiefstoreController@approve')->name('chiefstore.approve');
    Route::patch('chiefstore/{id}/rejected', 'ChiefstoreController@rejected')->name('user.rejected');
});

Route::group(['middleware' => ['helpdesk']], function () {
    Route::get('helpdesk/open', 'HelpdeskController@open')->name('helpdesk.open');
    Route::get('helpdesk/approve', 'HelpdeskController@approveshow')->name('helpdesk.approveshow');
    Route::get('helpdesk/reject', 'HelpdeskController@rejectedshow')->name('helpdesk.rejectedshow');
    Route::get('helpdesk/close', 'HelpdeskController@close')->name('helpdesk.close');
    Route::get('helpdesk/exportall', 'HelpdeskController@exportall')->name('helpdesk.exportall');
    Route::get('helpdesk/exportsolved', 'HelpdeskController@exportsolved')->name('helpdesk.exportsolved');
    Route::get('helpdesk/exportclose', 'HelpdeskController@exportclose')->name('helpdesk.exportclose');
    Route::get('helpdesk/{id}/print', 'HelpdeskController@print')->name('helpdesk.print');
    Route::resource('helpdesk', 'HelpdeskController');
    Route::patch('helpdesk/{id}/solved', 'HelpdeskController@solved')->name('helpdesk.solved');
    Route::patch('helpdesk/{id}/rejected', 'HelpdeskController@rejected')->name('helpdesk.rejected');
    Route::get('helpdesk/{id}/forward', 'HelpdeskController@forward')->name('helpdesk.forward');
    Route::get('helpdesk/{id}/forwardrnd', 'HelpdeskController@forwardrnd')->name('helpdesk.forwardrnd');
    //update 06012020
    Route::get('helpdesk/{id}/forwardfinance', 'HelpdeskController@forwardfinance')->name('helpdesk.forwardfinance');
    Route::get('helpdesk/{id}/proseshelpdesk', 'HelpdeskController@proseshelpdesk')->name('helpdesk.proseshelpdesk');
    Route::get('helpdesk/{id}/unproseshelpdesk', 'HelpdeskController@unproseshelpdesk')->name('helpdesk.unproseshelpdesk');
    Route::get('helpdesk/{id}/forwardsupplychain', 'HelpdeskController@forwardsupplychain')->name('helpdesk.forwardsupplychain');

    // Route::resource('akun', 'AkunController');
    Route::get('akun/{id}/aktifuser', 'AkunController@aktifuser')->name('akun.aktifuser');
    Route::get('akun/{id}/nonaktifuser', 'AkunController@nonaktifuser')->name('akun.nonaktifuser');
    Route::resource('cabang', 'CabangController');
    Route::resource('penyebab', 'PenyebabController');
    Route::resource('akibat', 'AkibatController');
    Route::post('getpercabang', 'HelpdeskController@getpercabang')->name('getcabang');
    Route::resource('/role', 'RoleController')->except(['create', 'show', 'edit', 'update']);
});

Route::group(['middleware' => ['infra']], function () {
    Route::resource('infra', 'InfraController');
    Route::patch('infra/{id}/solved', 'InfraController@solved')->name('infra.solved');
    Route::patch('infra/{id}/rejected', 'InfraController@rejected')->name('infra.rejected');
    Route::get('infra/{id}/forwardfinance', 'InfraController@forwardfinance')->name('infra.forwardfinance');
    Route::get('infra/{id}/forwardrnd', 'InfraController@forwardrnd')->name('infra.forwardrnd');
    Route::get('infra/{id}/forwardsupplychain', 'InfraController@forwardsupplychain')->name('infra.forwardsupplychain');
    Route::get('infra/{id}/prosesinfra', 'InfraController@prosesinfra')->name('infra.prosesinfra');
    Route::get('infra/{id}/unprosesinfra', 'InfraController@unprosesinfra')->name('infra.unprosesinfra');
});
Route::group(['middleware' => ['rnd']], function () {
    Route::resource('rnd', 'RndController');
    Route::patch('rnd/{id}/solved', 'RndController@solved')->name('rnd.solved');
    Route::patch('rnd/{id}/rejected', 'RndController@rejected')->name('rnd.rejected');
    Route::get('rnd/{id}/forwardfinance', 'RndController@forwardfinance')->name('rnd.forwardfinance');
    Route::get('rnd/{id}/forwardsupplychain', 'RndController@forwardsupplychain')->name('rnd.forwardsupplychain');
    Route::get('rnd/{id}/prosesrnd', 'RndController@prosesrnd')->name('rnd.prosesrnd');
    Route::get('rnd/{id}/unprosesrnd', 'RndController@unprosesrnd')->name('rnd.unprosesrnd');
});
Route::group(['middleware' => ['finance']], function () {
    Route::resource('finance', 'FinanceController');
    Route::patch('finance/{id}/solved', 'FinanceController@solved')->name('finance.solved');
    Route::patch('finance/{id}/rejected', 'FinanceController@rejected')->name('finance.rejected');
    Route::get('finance/{id}/forwardrnd', 'FinanceController@forwardrnd')->name('finance.forwardrnd');
    Route::get('finance/{id}/forwardhelpdesk', 'FinanceController@forwardhelpdesk')->name('finance.forwardfinance');
    Route::get('finance/{id}/forwardsupplychain', 'FinanceController@forwardsupplychain')->name('finance.forwardsupplychain');
    Route::get('finance/{id}/prosesfinance', 'FinanceController@prosesfinance')->name('finance.prosesfinance');
    Route::get('finance/{id}/unprosesfinance', 'FinanceController@unprosesfinance')->name('finance.unprosesfinance');
});
Route::group(['middleware' => ['supplychain']], function () {
    Route::resource('supplychain', 'SupplychainController');
    Route::patch('supplychain/{id}/solved', 'SupplychainController@solved')->name('supplychain.solved');
    Route::patch('supplychain/{id}/rejected', 'SupplychainController@rejected')->name('supplychain.rejected');
    Route::get('supplychain/{id}/forwardrnd', 'SupplychainController@forwardrnd')->name('supplychain.forwardrnd');
    Route::get('supplychain/{id}/forwardfinance', 'SupplychainController@forwardfinance')->name('supplychain.forwardfinance');
    Route::get('supplychain/{id}/forwardhelpdesk', 'SupplychainController@forwardhelpdesk')->name('supplychain.forwardsupplychain');
    Route::get('supplychain/{id}/prosessupply', 'SupplychainController@prosessupply')->name('supplychain.prosessupply');
    Route::get('supplychain/{id}/unprosessupply', 'SupplychainController@unprosessupply')->name('supplychain.unprosessupply');
});
Route::group(['middleware' => ['developer']], function () {
    Route::resource('developer', 'DeveloperController');
    Route::patch('developer/{id}/solved', 'DeveloperController@solved')->name('developer.solved');
    Route::patch('developer/{id}/rejected', 'DeveloperController@rejected')->name('developer.rejected');
});
