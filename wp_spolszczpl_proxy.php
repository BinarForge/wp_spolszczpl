<?php

if(isset($_POST['txt']))
{
	$SC = new SoapClient("http://www.spolszcz.pl/webapi.wsdl");
	echo $SC->Spolszcz($_POST['txt']);
	exit;
}

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );