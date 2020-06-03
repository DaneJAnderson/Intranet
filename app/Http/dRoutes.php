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
Route::get('/uploads/creates/{$id}', 'uploadsController@retrieve');

// Create new Records file Api
Route::post('/uploads/post', 'uploadsController@post');

// Update Records 
Route::put('/uploads/updates/{$id}', 'uploadsController@updates');

Route::get('/birthday/updates', 'birthdayController@updates');


// Get All Staff 
Route::get('/API/birthday_staff_manager', 'staffBirthdayController@getAllStaff');

// Update Staff Status
 Route::post('/API/updatestatus', 'staffBirthdayController@updatestatus');

 // Edit Birthday 
 Route::post('/API/edit_bday_staff', 'staffBirthdayController@edit_bday_staff');
 

 // Retrieve All Staff Birthdays
 Route::post('/API/retrieve_bday_staff', 'staffBirthdayController@retrieve_bday_staff');

 // Create New staff Birthday Details
 Route::post('/API/create_bday_staff', 'staffBirthdayController@create_bday_staff');

 // LDAP connection to Domain Server
 Route::post('/API/domainconnect', 'domainConnectController@logIn');

 // Suggestion Box Post to Database
 Route::post('/API/suggestionbox/creates', 'suggestionBoxController@creates');

 // Suggestion Box Display Input Fields
 Route::get('/suggestionbox/shows', 'suggestionBoxController@shows');

 // Suggestion Box Show All suggestions
 Route::get('/suggestionbox/show_suggest', 'suggestionBoxController@show_suggest');

 // Suggestion Box Display Suggestions
 Route::get('/API/suggestionbox/retrieves', 'suggestionBoxController@retrieves');

 Route::post('/API/suggestionbox/updates', 'suggestionBoxController@updates');

  // Suggestion Box get Response
  Route::post('/API/suggestionbox/suggest_response', 'suggestionBoxController@suggest_response');
 

?>