<?php


if (Auth::logged()) {
	
	Route::get('/', 'Home@index');

	Route::get('/Rentals/index', 'Rentals@index');
	Route::get('/Rentals/{id}', 'Rentals@singleRental', $req = ['/^\d+$/']);
	Route::get('/Rentals/{page}', 'Rentals@index', $req = ['/^p\d+$/']);
	Route::post('/Rentals/addNewRental', 'Rentals@addNewRental');
	Route::post('/Rentals/closeRental', 'Rentals@closeRental');

	Route::get('/Films/index', 'Films@index');
	Route::get('/Films/{id}/{page}', 'Films@singleFilm', $req = ['/^\d+$/', '/^p\d+$/']);
	Route::get('/Films/{page}', 'Films@index', $req = ['/^p\d+$/']);
	Route::post('/Films/addNewFilm', 'Films@addNewFilm');
	Route::post('/Films/editFilmData', 'Films@editFilmData');
	Route::post('/Films/removeFilm', 'Films@removeFilm');

	Route::get('/Clients/index', 'Clients@index');
	Route::get('/Clients/{id}/{page}', 'Clients@singleClient', $req = ['/^\d+$/', '/^p\d+$/']);
	Route::get('/Clients/{page}', 'Clients@index', $req = ['/^p\d+$/']);
	Route::post('/Clients/addNewClient', 'Clients@addNewClient');
	Route::post('/Clients/editClientData', 'Clients@editClientData');
	Route::post('/Clients/removeClient', 'Clients@removeClient');

	Route::get('/Admin/index', 'Admin@index');
	Route::post('/Admin/addNewUser', 'Admin@addNewUser');
	Route::post('/Admin/editUserData', 'Admin@editUserData');
	Route::post('/Admin/removeUser', 'Admin@removeUser');

	Route::get('/AjaxCalls/index', 'AjaxCalls@index');

	Route::post('/Login/logoutUser', 'Login@logoutUser');
} else {
	Route::post('/Login/loginUser', 'Login@loginUser');
	Route::redirect('Login@index');
}