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

Auth::routes();

Route::get('lang/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});

// Front-end routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/tour', 'TourController@index')->name('home');
Route::get('/car', 'CarController@index')->name('home');
Route::get('/car/getlocation', 'CarController@getlocation');

Route::get('/booking/{id}', 'CarController@booking')->name('booking');
Route::post('/booking/{id}', 'CarController@booking')->name('bookingPost');

Route::get('/booking/success/{bookingId}', 'CarController@success')->name('car.success');

Route::get('/contact-us', 'HomeController@contactUs')->name('contactUs');
Route::post('/contact-us', 'HomeController@contactUs')->name('contactUs');

Route::get('/booking-query', 'HomeController@bookingQuery')->name('home.booking-query');
Route::post('/booking-query', 'HomeController@bookingQuery')->name('home.booking-query');

// Admin routes
$router->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function($router)
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('vehicle', 'VehicleController');

    Route::resource('affiliate', 'AffiliateController');

    Route::resource('booking', 'BookingController');
    Route::get('/booking/status/{id}/{status}', 'BookingController@status')->name('booking.status');

    Route::get('/booking/assign/{id}', 'BookingController@assign')->name('booking.assign');
    Route::post('/booking/assign/{id}', 'BookingController@assign')->name('booking.assign');

    Route::get('/booking/cancel/{id}', 'BookingController@cancel')->name('booking.cancel');
    Route::post('/booking/cancel/{id}', 'BookingController@cancel')->name('booking.cancel');

    Route::get('/booking/print/{id}', 'BookingController@printBooking')->name('booking.print');

    Route::post('/booking/select', 'BookingController@select')->name('booking.select');

    Route::get('/booking/new-booking', 'BookingController@newBooking')->name('booking.new-booking');
    Route::post('/booking/new-booking', 'BookingController@newBooking')->name('booking.new-booking');

    Route::get('/booking/success/{bookingId}', 'BookingController@success')->name('booking.success');

    Route::resource('content', 'ContentController');
    Route::resource('driver', 'DriverController');
    Route::resource('invoice', 'InvoiceController');

    Route::resource('location', 'LocationController');
    Route::resource('price', 'PriceController');
    Route::resource('contact-message', 'RequestController');
    Route::resource('setting', 'SettingController');
    Route::resource('user', 'UserController');
    Route::resource('location-type', 'LocationTypeController');
    Route::resource('tour', 'TourController');
    Route::resource('tourcategory', 'TourCategoryController');

    Route::resource('plate', 'PlateController');
});

Route::get('/{slug}', array('as' => 'home.content', 'uses' => 'HomeController@content'));

Route::get('/destination/{slug}', array('as' => 'home.destination', 'uses' => 'HomeController@destination'));
