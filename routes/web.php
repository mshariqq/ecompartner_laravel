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

Auth::routes(['verify' => true]);

Route::get('/', 'Guest\GuestController@index')->name('main');

Route::prefix('/')->group(function() {
	Route::get('/home', 'User\HomeController@index')->name('home');
	Route::get('/users/logout', 'Auth\LoginController@logout')->name('user.logout');
});

Route::get('/login/{social}','Auth\LoginController@redirectToProvider')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

// Special Routes
Route::prefix('special')->group(function() {
	Route::get('/back/{name}', 'ReturnRedirectController@back')->name('go.back');
});

// Seller / user Leads
Route::prefix('seller')->middleware('auth')->group(function() {
	// list
	Route::get('leads/leads-list', 'LeadsController@leadsListIndex')->name('leads.leads-list.index');

	// import
	Route::get('leads/import', 'LeadsController@importLeads')->name('leads.import');
	Route::post('leads/import/store', 'LeadsController@storeLeads')->name("leads.import.store");

	// leads
	Route::get('leads/{id}', 'LeadsController@viewLeads');

	// orders
	Route::get('orders/all', 'OrdersController@viewAll')->name('orders.all');

	// warehouses
	Route::get('warehouses/all', 'WarehouseController@all')->name('warehouses.all');
	Route::get('warehouses/new', 'WarehouseController@new')->name('warehouses.new');	
	Route::post('warehouses/insert', 'WarehouseController@insert')->name('warehouses.insert');
	Route::get('warehouses/products/all', 'WarehouseController@myProducts')->name('warehouses.products');
	Route::get('warehouses/products/{id}', 'WarehouseController@wareouseProducts');	
	Route::get('warehouses/products/new/{id}', 'WarehouseController@newWareouseProduct');	
	Route::post('warehouses/products/insert', 'WarehouseController@insertWareouseProduct')->name('warehouses.product.insert');
	
});

Route::prefix('admin')->group(function() {

	Route::get('/', 'Admin\HomeController@index')->name('admin.dashboard');
	Route::get('/home', 'Admin\HomeController@index')->name('admin.home');

	Route::get('/profile', 'Admin\ProfileController@index')->middleware('auth:admin')->name('admin.profile');
	Route::put('/profile/update/{id}', 'Admin\ProfileController@update')->middleware('auth:admin')->name('admin.profile.update');
	Route::get('/profile/password', 'Admin\ProfileController@password')->middleware('auth:admin')->name('admin.profile.password');
	Route::put('/profile/password', 'Admin\ProfileController@updatePassword')->middleware('auth:admin')->name('admin.profile.password.update');

	// AdminsController
	Route::resource('admins', 'Admin\AdminsController')->middleware('auth:admin', 'SuperAdmin');

	// sellers list
	Route::get('/sellers/all', 'Admin\SellerController@index')->middleware('auth:admin')->name('admin.sellers.all');
	Route::get('/sellers/add', 'Admin\SellerController@addSeller')->middleware('auth:admin')->name('admin.sellers.add');
	Route::get('/sellers/profile/{id}', 'Admin\SellerController@profile')->middleware('auth:admin')->name('admin.sellers.profile');


	// Leads
	Route::get('/sellers/leads/all', 'Admin\LeadsController@allLeads')->middleware('auth:admin')->name('admin.leads.all');
	Route::get('/sellers/leads/ajax/change-status/{id}/{status}', 'Admin\LeadsController@changeLeadStatus')->middleware('auth:admin');
	Route::get('/sellers/leads/import', 'Admin\LeadsController@importLeads')->middleware('auth:admin')->name('admin.leads.import');
	Route::get('/sellers/leads/lead/{leadid}', 'Admin\LeadsController@ordersOfLead')->middleware('auth:admin');
	Route::get('/sellers/lead/ajax/change-status/{id}/{status}', 'Admin\LeadsController@changeOrderStatus')->middleware('auth:admin');

	// Orders
	Route::get('/sellers/orders/all', 'Admin\OrdersController@allOrders')->middleware('auth:admin')->name('admin.orders.all');
	Route::get('/sellers/orders/ajax/change-status/{id}/{status}', 'Admin\OrdersController@changeOrderStatus')->middleware('auth:admin');

	// Warehouses
	Route::get('/warehouse/all', 'Admin\WarehouseController@all')->middleware('auth:admin')->name('admin.warehouse.all');
	Route::get('/warehouse/products/all', 'Admin\WarehouseController@allProducts')->middleware('auth:admin')->name('admin.warehouse.products.all');
	Route::get('/warehouse/purchases/all', 'Admin\WarehouseController@productPurchases')->middleware('auth:admin')->name('admin.warehouse.product-purchases');

	Route::get('/warehouse/buy-stock/product/{id}', 'Admin\WarehouseController@buyStock')->middleware('auth:admin');
	Route::post('/warehouse/buy-stock/product/store', 'Admin\WarehouseController@buyStockStore')->middleware('auth:admin');

	// Login Logout Routes
	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

	// Password Resets Routes
	Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');
	Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	// Email Verification
	Route::get('email/verify/{id}/{hash}', 'Auth\Admin\VerificationController@verify')->name('admin.verification.verify');

});