<?php

function csrf_token(){
	if(session_status() == PHP_SESSION_NONE){
		return 'session_start() has not declared yet !';
	}else{
		$token= md5(uniqid(rand()));
		$_SESSION['csrf_token'] = $token ;
		return $_SESSION['csrf_token'] ;
	}
}


?>