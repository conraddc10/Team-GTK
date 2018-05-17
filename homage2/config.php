<?php
	session_start();
	require_once 'GoogleAPI/vendor/autoload.php';
	$gClient = new Google_Client();
	$gClient->setClientId("362135563634-v17l0g4ogvvh7u4jd44glovddr8q4bbi.apps.googleusercontent.com");
	$gClient->setClientSecret("fRa9Imq-5KlTxyzrwlfn1PdG");
	$gClient->setApplicationName("Homage");
	$gClient->setRedirectUri("http://localhost/homage2/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login");
	$gClient->addScope("https://www.googleapis.com/auth/userinfo.email");

?>