/**
* Project  : $[G-P's Technologies Website* Author(s): Gavin Palmer
* Date     : August 1st, 2016
* Company  : $[G-P's]$ Technologies Limited
*/

var App = angular.module('App',['ui.router']);

//Constants
App.constant('APP_Config',
{
    App_Name   : 'COK Intranet 2018',
    App_Version: 1.0,    
    //App_URL    : 'http://intranew/intranet/public/',
    // App_API_URL: 'http://intranew/intranet/public/API/',
    //App_Storage_URL: 'http://intranew/intranet/storage/app/public/',
    App_URL    : 'http://localhost/intranet/public/',
	App_API_URL: 'http://localhost/intranet/public/API/',	
	App_Storage_URL: 'http://localhost/intranet/storage/app/public/',
	Debug: false
});

App.config(['$stateProvider', '$urlRouterProvider', 'APP_Config', function($stateProvider, $urlRouterProvider, APP_Config)
{
    
}]);

// Mute Unhandled Catch Error Notifications.
App.config(function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
});

//Global Angular Services
App.run(function ($rootScope, $location, $http, $timeout, utilityService)
{
	$rootScope.utilityService = utilityService;
});



/*$[G-P]$*/