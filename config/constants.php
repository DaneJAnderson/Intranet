<?php

$host = $_SERVER['HTTP_HOST'];// set to $_SERVER['SERVER_ADDR'] for local testing and $_SERVER['HTTP_HOST'] for live.

return
[
	//URI for local developemnt, should be removed for launch
	'BASE_URI' => $_SERVER['DOCUMENT_ROOT'].'/intranet/public/',
	
	'BASE_URL' => $host.'/intranet/public/',
	
	'API_BASE_URI' => $_SERVER['DOCUMENT_ROOT'].'/intranet/public/API/',
	
	'API_BASE_URL' => $host.'/intranet/API/',
	
	'App_name' => 'COK Intranet',
	
	'App_version_code' => 1.0,
	
	'App_version_name' => 'COK Intranet 2018',
	
	'App_slogon' => 'Invest in your future today.',
	
	'Customer_care_number' => '+1876-60-4226',
	
	'Storage_URI' => $_SERVER['DOCUMENT_ROOT'].'/intranet/storage/app/public/',
	
	'Storage_URL' => $host.'/intranet/storage/app/public/',
	
	'Cache_timeout' => 0,
	
	'http_or_https' => 'http://',
];
