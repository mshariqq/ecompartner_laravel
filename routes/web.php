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
Route::get('/shariqq/{command}', 'Guest\GuestController@shariqqCommand');
Route::get('/blocked', 'Guest\GuestController@blockedSellerPage')->name('blocked.page');

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
	Route::post('/home/ajax/today-filer', 'User\HomeController@todayFilter')->name('dashboard.today-filter');
	Route::post('/home/ajax/data-fetch', 'User\HomeController@DashAJaxDataFetch')->name('dashboard.ajax.datafetch');

	// import
	Route::get('leads/import', 'LeadsController@importLeads')->name('leads.import');
	Route::post('leads/import/store', 'LeadsController@storeLeads')->name("leads.import.store");

	// leads
	Route::get('leads/{id}', 'LeadsController@viewLeads');

	// orders
	Route::get('orders/all/{where?}', 'OrdersController@viewAll')->name('orders.all');
	Route::get('orders/track', 'OrdersController@track')->name('orders.track');
	Route::post('orders/track/data', 'OrdersController@trackOrder')->name('orders.track.data');
	Route::post('orders/export', 'OrdersController@exportOrders')->name('orders.export');

	// Reports
	Route::get('/reports/cod-analysis/filter/', 'ReportsController@codAnalysisFilter')->name('reports.cod-analysis.filter');
	Route::get('/reports/cod-analysis', 'ReportsController@codAnalysis')->name('reports.cod-analysis');
	Route::post('/reports/cod-analysis/ajax/data-fetch', 'ReportsController@codAnalysisAJaxDataFetch')->name('reports.cod-analysis.ajax.datafetch');

	// warehouses
	Route::get('warehouses/all', 'WarehouseController@all')->name('warehouses.all');
	Route::get('warehouses/new', 'WarehouseController@new')->name('warehouses.new');	
	Route::post('warehouses/insert', 'WarehouseController@insert')->name('warehouses.insert');
	Route::get('warehouses/products/all', 'WarehouseController@myProducts')->name('warehouses.products');
	Route::get('warehouses/products/{id}', 'WarehouseController@wareouseProducts')->name('warehouses.products.inside');	
	Route::get('warehouses/products/new/{id}', 'WarehouseController@newWareouseProduct');	
	Route::post('warehouses/products/insert', 'WarehouseController@insertWareouseProduct')->name('warehouses.product.insert');
	Route::get('warehouses/request-stock/{product_id}', 'WarehouseController@requestStock')->name('warehouses.product.request-stock');
	Route::post('warehouses/request-stock/insert', 'WarehouseController@requestStockInsert')->name('warehouses.product.request-stock.insert');
	Route::get('warehouses/requests/my-all', 'WarehouseController@myRequests')->name('warehouses.product.request.all');

	Route::get('/profile', 'User\ProfileController@index')->name('seller.profile');
	Route::put('/profile/update/{id}', 'User\ProfileController@update')->name('seller.profile.update');
	Route::get('/profile/password', 'User\ProfileController@password')->name('seller.profile.password');
	Route::put('/profile/password', 'User\ProfileController@updatePassword')->name('seller.profile.password.update');

});

Route::prefix('admin')->group(function() {

	Route::get('/', 'Admin\HomeController@index')->name('admin.dashboard');
	Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
	Route::post('/home/ajax/today-filer', 'Admin\AdminsController@todayFilter')->middleware('auth:admin')->name('admins.dashboard.today-filter');
	Route::post('/home/ajax/data-fetch', 'Admin\AdminsController@DashAJaxDataFetch')->middleware('auth:admin')->name('admin.dashboard.ajax.datafetch');

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
	Route::get('/sellers/profile/block/{id}/{status}', 'Admin\SellerController@profileBlock')->middleware('auth:admin')->name('admin.sellers.profile.block');

	// Purchse Requests
	Route::get('/purchase-requests/all', 'Admin\PurchaseRequests@all')->middleware('auth:admin')->name('admins.purchase.requests');
	Route::get('/purchase-requests/confirm/{id}', 'Admin\PurchaseRequests@confirm')->middleware('auth:admin')->name('admins.purchase.requests.confirm');
	Route::get('/purchase-requests/reject/{id}', 'Admin\PurchaseRequests@reject')->middleware('auth:admin')->name('admins.purchase.requests.reject');

	// Leads
	Route::get('/sellers/leads/all', 'Admin\LeadsController@allLeads')->middleware('auth:admin')->name('admin.leads.all');
	Route::get('/sellers/leads/ajax/change-status/{id}/{status}', 'Admin\LeadsController@changeLeadStatus')->middleware('auth:admin');
	Route::get('/sellers/leads/import', 'Admin\LeadsController@importLeads')->middleware('auth:admin')->name('admin.leads.import');
	Route::get('/sellers/leads/lead/{leadid}', 'Admin\LeadsController@ordersOfLead')->middleware('auth:admin');
	Route::get('/sellers/lead/ajax/change-status/{id}/{status}', 'Admin\LeadsController@changeOrderStatus')->middleware('auth:admin');

	// Orders
	Route::get('/sellers/orders/all/{Sellerwhere?}', 'Admin\OrdersController@allOrders')->middleware('auth:admin')->name('admin.orders.all');
	Route::get('/sellers/orders/ajax/change-status/{id}/{status}', 'Admin\OrdersController@changeOrderStatus')->middleware('auth:admin');
	Route::post('/orders/export', 'Admin\OrdersController@exportOrders')->middleware('auth:admin')->name('admins.orders.export');

	// Warehouses
	Route::get('/warehouse/all', 'Admin\WarehouseController@all')->middleware('auth:admin')->name('admin.warehouse.all');
	Route::get('/warehouse/products/all/{where?}', 'Admin\WarehouseController@allProducts')->middleware('auth:admin')->name('admin.warehouse.products.all');
	Route::get('/warehouse/purchases/all', 'Admin\WarehouseController@productPurchases')->middleware('auth:admin')->name('admin.warehouse.product-purchases');
	Route::get('/warehouse/products/approval/{id?}/{status}', 'Admin\WarehouseController@productApproval')->middleware('auth:admin')->name('admin.warehouse.product.approval');

	Route::get('/warehouse/buy-stock/product/{id}', 'Admin\WarehouseController@buyStock')->middleware('auth:admin');
	Route::post('/warehouse/buy-stock/product/store', 'Admin\WarehouseController@buyStockStore')->middleware('auth:admin');

	// Reports
	Route::get('/reports/cod-analysis/filter/', 'Admin\ReportsController@codAnalysisFilter')->middleware('auth:admin')->name('admin.reports.cod-analysis.filter');
	Route::get('/reports/cod-analysis', 'Admin\ReportsController@codAnalysis')->middleware('auth:admin')->name('admin.reports.cod-analysis');
	Route::post('/reports/cod-analysis/ajax/data-fetch', 'Admin\ReportsController@codAnalysisAJaxDataFetch')->middleware('auth:admin')->name('admin.reports.cod-analysis.ajax.datafetch');

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