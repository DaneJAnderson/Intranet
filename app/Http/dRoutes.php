<?php

/*

1. Route - show, edit , post
2. Module && database : php artisan make:model Uploads -m
3. Controller
4. Form && Form validation
5. View 
6. Upload Method - Multi-upload


*/


// Form fields to Enter Uploads
Route::get('/uploads/creates', 'uploadsController@creates'); //

// Retrieve File from database for Editing.
Route::get('/uploads/creates/{id}', 'uploadsController@retrieve');

// Create new Records file Api
Route::post('/uploads/post', 'uploadsController@post');

// Update Records 
Route::put('/uploads/updates/{$id}', 'uploadsController@updates');

Route::get('/birthday/updates', 'birthdayController@updates');

// Get All Staff 
Route::get('/API/birthday_staff_manager', 'staffBirthdayController@getAllStaff');

// Update Staff Status
 Route::post('/API/updatestatus', 'staffBirthdayController@updatestatus');

 Route::post('/API/edit_bday_staff', 'staffBirthdayController@edit_bday_staff');
 
 Route::post('/API/delete_bday_staff', 'staffBirthdayController@delete_bday_staff');


// Route::post('/updatestatus', function ()
// 	{
//     	return "<h1>Hello i am here</h1>";
// 	});


















?>