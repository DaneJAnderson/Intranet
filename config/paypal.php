<?php
return array(
/** set your paypal credential **/
'client_id' =>'AfwRTnQ-fGFW8U4KPeHKKEhd2WvXVGliJ_2ntCSS-SpLhtV06EAkglnynED6sqRdPCLNtsbojm5swRGp',
'secret' => 'EBpvyyH7_dC8jvlIK3fW0DgexgRS3NTnbNk4PMx3q--lOGxI-PsIoq-BCdEpgN3ZTUkSVfcberHt16xp',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);