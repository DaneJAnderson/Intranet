<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function ()
{
    return view('home');
});


//Routing for User access
Route::get('/login', function ()
{
    return view('login');
});


Route::get('/home', function ()
{
    return view('home');
});


Route::get('/about', function ()
{
    return view('about');
});\


Route::get('/tools', function ()
{
    return view('tools');
});


Route::get('/noticeboard', function ()
{
    return view('noticeboard');
});


Route::get('/article/{id}', ['middleware' => [/*'Session_Manager'*/], function($id)
{    
	return view('article')->with('id', $id);
}]);


Route::get('/document_types', ['middleware' => [/*'Session_Manager'*/], function()
{    
	return view('document_types');
}]);


Route::get('/documents/{id}', ['middleware' => [/*'Session_Manager'*/], function($id)
{    
	return view('documents')->with('id', $id);
}]);


Route::get('/gallery', function ()
{
    return view('gallery');
});


Route::get('/gallery/{id}', ['middleware' => [/*'Session_Manager'*/], function($id)
{    
	return view('photos')->with('id', $id);
}]);


Route::get('/photos', function ()
{
    return view('photos');
});


Route::get('/template', function ()
{
    return view('template');
});


Route::get('/help', function ()
{
	$routeCollection = Route::getRoutes();

	foreach ($routeCollection as $value)
	{
		echo '<br/><b>'.$value->getName().'</b>&nbsp; - &nbsp;'.$value->getPath();
		
		//$value->getName();
		//$value->getPath();
	}
	
	return;
});


//To be used for the API routes
Route::group(['prefix'=>'API'], function()
{
	Route::get('/', function ()
	{
    	return view('welcome');
	});
	
	
	Route::get('/routes', function ()
	{
		$routeCollection = Route::getRoutes();

		$ApplicationRoutes = array();
		
		foreach ($routeCollection as $value)
		{
			$ApplicationRoute = array($value->getName()=>$value->getPath());
			$ApplicationRoute = json_encode($ApplicationRoute);
			array_push($ApplicationRoutes, $ApplicationRoute);
			//$value->getName();
			//$value->getPath();
		}
		
		$ApplicationRoutes = json_encode($ApplicationRoutes);
		echo $ApplicationRoutes;
		
		return;
	});
	

	Route::get('/last_articles', [
								'uses' => 'articleController@getLatestArticles',
								'as' => 'getLatestArticles',
								//'middleware' => ['Session_Manager']
						  ]
			    );

	Route::get('/article/{id}', [
								'uses' => 'articleController@getArticleByID',
								'as' => 'getArticleByID',
								//'middleware' => ['Session_Manager']
						  ]
			    );

	Route::get('/document_types', [
								'uses' => 'documentController@getDocumentTypes',
								'as' => 'getDocumentTypes',
								//'middleware' => ['Session_Manager']
						  ]
			    );

	Route::get('/documents', [
								'uses' => 'documentController@getDocumentByID',
								'as' => 'getDocumentByID',
								//'middleware' => ['Session_Manager']
						  ]
			    );

	Route::get('/galleries', [
								'uses' => 'galleryController@getGalleries',
								'as' => 'getGalleries',
								//'middleware' => ['Session_Manager']
						  ]
			    );


	Route::get('/photos/{id}', [
								'uses' => 'galleryController@getPhotosGalleryByID',
								'as' => 'getPhotosGalleryByID',
								//'middleware' => ['Session_Manager']
						  ]
			    );


	Route::get('/current_birthdays', [
								'uses' => 'staffdetailsController@getCurrentBirthdays',
								'as' => 'getCurrentBirthdays',
								//'middleware' => ['Session_Manager']
						  ]
			    );
			  
	Route::post('/login', [
								'uses' => 'userController@postLogin',
								'as' => 'login',
								//'middleware' => ['Session_Manager']
						  ]
			    );
				
	Route::get('/logout', [
									'uses' => 'userController@postLogout',
									'as' => 'logout',
									//'middleware' => ['Session_Manager']
						   ]
			    );
				
	Route::get('/login_status', [
									'uses' => 'userController@getLoginStatus',
									'as' => 'login_status',
									//'middleware' => ['Session_Manager']
						   ]
			    );
});

/*
To be used for the App routes
Route::group(['prefix'=>'App'], function()
{
    Route::get('/Route', 'Module@function');
});
*/

