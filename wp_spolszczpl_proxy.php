<?php

if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die;
}

if(isset($_POST['txt']))
{
	$SC = new SoapClient("http://www.spolszcz.pl/webapi.wsdl");
	echo $SC->Spolszcz($_POST['txt']);
	exit;
}