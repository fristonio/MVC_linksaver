<?php 
	//global $CONFIG;
    $CONFIG = json_decode(file_get_contents(__DIR__ . "/../app/conf/config.json"), true);
	require_once __DIR__ ."/../vendor/autoload.php";
	ToroHook::add("404", function(){
		echo "404 Error";
		http_response_code(404);
	});
	Toro::serve([
		'/' => Link\Controllers\HomeController::class,
		'/home' => Link\Controllers\HomeController::class,
		'/login' => Link\Controllers\LoginController::class,
		'/register' => Link\Controllers\RegisterController::class,
		'/dashboard' => Link\Controllers\DashboardController::class,
		'/admin' => Link\Controllers\AdminController::class,
		'/deletelink' => Link\Controllers\DeleteLinkController::class,
		'/logout' => Link\Controllers\LogoutController::class
	]);
