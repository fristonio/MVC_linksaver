<?php 
	require_once __DIR__ ."/../vendor/autoload.php";

	ToroHook::add("404", function(){
		echo "404 Error";
		http_response_code(404);
	});
	Toro::serve([
		'/' => Link\Controllers\HomeController::class,
		'/home.html' => Link\Controllers\HomeController::class,
		'/login' => Link\Controllers\LoginController::class,
	]);