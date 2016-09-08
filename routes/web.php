<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | This file is where you may define all of the routes that are handled
 * | by your application. Just tell Laravel the URIs it should respond
 * | to using a Closure or controller method. Build something great!
 * |
 */
use App\Csvdata;

Route::get ( '/', function () {
	
	if (($handle = fopen ( public_path () . '/MOCK_DATA.csv', 'r' )) !== FALSE) {
		while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
			$csv_data = new Csvdata ();
			$csv_data->id = $data [0];
			$csv_data->firstname = $data [1];
			$csv_data->lastname = $data [2];
			$csv_data->email = $data [3];
			$csv_data->gender = $data [4];
			$csv_data->save ();
		}
		fclose ( $handle );
	}
	
	$finalData = $csv_data::all ();
	
	return view ( 'welcome' )->withData ( $finalData );
} );