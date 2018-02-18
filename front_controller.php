<?php
require 'controllers.php';
session_start();
//require 'access.php';

require_once 'routing.php';
$action_url = $_GET['action'];

$controller_name = $routing[$action_url];
require_once './classes/functions.php';
	$db = get_db();

if($controller_name)
{
	require_once './classes/body_class.php';
		$body = new body();
		$body -> show_top();
$controller_name();
		$body -> show_bottom();
}	
else if($action_url == '/ajax')
{
	ajax();
}

		
//require $controller_name . '.php';

/*
switch ($action_url)
{
	case '/':
		require 'index.php';
		break;
	case '/register':
		require 'register.php';
		break;
	case '/log-in':
		require 'log_in.php';
		break;
	case '/begining':
		require 'begining.php';
		break;
	case '/top10':
		require 'top10.php';
		break;
	case '/gallery':
		require 'gallery.php';
		break;
	case '/user-gallery':
		require 'only_checked_gallery.php';
		break;
	case '/search':
		require 'find_pic_ajax.php';
		break;
	case '/upload':
		require 'upload.php';
		break;
	case '/delete-img':
		require 'delete.php';
		break;
	case '/send':
		require 'send.php';
		break;
	case '/about':
		require 'about.php';
		break;
}*/
?>