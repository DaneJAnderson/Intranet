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

// Edit Files view
Route::get('/uploads/creates/{id}', 'uploadsController@updates');

// Uploading file Api
Route::post('/uploads/post', 'uploadsController@post');
























?>