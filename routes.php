<?php


if (Auth::logged()) {
	Route::get('/', 'Home@index');
	Route::get('/Rentals/index', 'Rentals@index');
	Route::get('/Rentals/{id}', 'Rentals@singleRental', $req = ['/^[0-9]$/']);
	Route::get('/Rentals/{page}', 'Rentals@index', $req = ['/^p[0-9]$/']);
	Route::get('/Films/index', 'Films@index');
	Route::get('/Clients/index', 'Clients@index');
	Route::post('/Clients/addNewClient', 'Clients@addNewClient');
	Route::get('/AjaxCalls/index', 'AjaxCalls@index');
	Route::post('/Login/logoutUser', 'Login@logoutUser');
} else {
	Route::post('/Login/loginUser', 'Login@loginUser');
	Route::redirect('Login@index');
}