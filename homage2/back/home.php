<?php
session_start();

if(is_null($_SESSION['user_id'] )){
	  header('location:../index.html');
}else {
	echo $_SESSION['user_id'];
}


  ?>