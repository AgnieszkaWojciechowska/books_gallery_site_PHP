<?php
require_once './classes/functions.php';
		
require_once './classes/body_class.php';
		$body = new body();

function index()
{
	include './views/index_view.php';
}

function register_user()
{
	require_once './classes/body_class.php';
	$body = new body();
	include './views/register_view.php';
	
	$login = $_POST['login'];
	$mail = $_POST['e-mail'];
	$password = $_POST['haslo'];
	$repeat_password = $_POST['p_haslo'];
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		register_action($login, $mail, $password, $repeat_password);
	else
		http_response_code(404);
	
	$body -> close_register_tag();
}

function log_in()
{
	require_once './classes/body_class.php';
	$body = new body();
	include './views/log_in_view.php';
	
	$login = $_POST['login'];
	$password = $_POST['haslo'];
	$url = $_POST['url'];
	
	if ($_SERVER["REQUEST_METHOD"] === 'POST') 
	{
		if(($session = log_in_action($login, $password, $url)) != false)
		{
			$_SESSION['user_id'] = $session;
			echo '<html><head><meta http-equiv="refresh" content="1;url=' . $url . '"/></head><body>Redirecting to ' . $url . '</body></html>';
			echo ' Hasło paprawne! ';
			echo " Zalogowano!\n";
		}	
	}
	else
		http_response_code(404);
		
	
	$body -> close_register_tag();
}

function logout_u()
{
	require_once './classes/body_class.php';
	$body = new body();
	user_logout();
	$url = 'front_controller.php?action=/'; 
	$body -> fieldset_top('Wylogowywanie...');
	echo '<html><head><meta http-equiv="refresh" content="1;url=' . $url . '"/></head><body>Redirecting to ' . $url . '</body></html>';		
	echo (" użytkownik wylogowany") ;
	$body -> fieldset_bottom();
}

function begining()
{
	include './views/begining_view.php';
}

function top10()
{	
	include './views/top10_view.php';
	include './classes/log_in_action.php';
}

function gallery()
{
	require_once './classes/body_class.php';
	$body = new body();
	$db = get_db();
	$path = './DocumentRoot/images/thumb/';
	$picture = get_pictures();
	
	include './views/gallery_view.php';
}

function user_gallery()
{	
	require_once './classes/body_class.php';
		$body = new body();
	$path = './DocumentRoot/images/thumb/';
	$picture = get_pictures();	
	
	include './views/only_checked_gallery_view.php';
}

function check_picture()
{
	require_once './classes/body_class.php';
	$body = new body();
	$body -> fieldset_top('Zapamiętaj zaznaczone zdjęcia:');
	picture_checking();
	$body -> fieldset_bottom();
}

function picture_uncheck()
{
	require_once './classes/body_class.php';
	$body = new body();
	$body -> fieldset_top('Odznacz zdjęcia:');
	picture_unchecking();
	$body -> fieldset_bottom();
}

function find_pic_ajax()
{
	require_once './classes/body_class.php';
	
	$body = new body();
	$db = get_db();
	$picture = get_pictures();
	
	include './views/find_pic_ajax_view.php';	
	$hint = "";	
}

function manual_search_user()
{
	require_once './classes/body_class.php';
	$body = new body();
	$db = get_db();
	$picture = get_pictures();
	if ($_SERVER['REQUEST_METHOD'] === 'POST' )
	{
		$q = $_POST['q'];
		$path = './DocumentRoot/images/thumb/';
		$img = search_pic($q);
		$body -> post_gallery_picture($path, $img);
	}
	$body -> manual_search_button();
}


function ajax()
{
	require_once './classes/body_class.php';
		$body = new body();
	$db = get_db();
	$q = $_REQUEST["q"];
	if($q)
	{
		$session_id = $_SESSION['user_id'];
		$path = './DocumentRoot/images/thumb/';
		$img = search_pic($q);
		$body -> post_gallery_picture($path, $img);
	}
}

function upload()
{
	require_once './classes/body_class.php';
		$body = new body();
	$db = get_db();
	$body -> upload_view_up();
	$session = $_SESSION['user_id'];
	$user = user_logged($session);
	echo $user;
	if($user != false)
		$body -> logged_upload_view($user['login']);
	else
		$body -> guest_upload_view();
	$body -> upload_view_down();
}

function image_process()
{
	$db = get_db();
	require_once './classes/body_class.php';
		$body = new body();
		
	$tmp_filename = $_FILES['plik']['tmp_name'];
	$filename = $_FILES['plik']['name'];
	$file_size = $_FILES['plik']['size'];
	$file_type = $_FILES['plik']['type'];
	$error = $_FILES['plik']['error'];
	$watermark_string = $_POST['watermark'];
	$title = $_POST['title'];
	$autor = $_POST['autor'];
	$session_u_id = $_SESSION['user_id'];
	$settings = $_POST['settings'];
	$id = $_POST['id'];
	
	$body -> fieldset_top('Załaduj plik JPEG lub PNG o wielkosci do 1MB:');

	image_processing($tmp_filename, $filename, $file_size, $file_type, $error, $watermark_string);
	
	$body -> upload_status_bottom();
}


function delete_img()
{
	$id = $_POST['id'];
	$yd = $_GET['id'];
	if (!empty($yd)) {
		$picture = get_pic_by_id($yd);
	}
	
	include './views/delete_view.php';
	image_delete($id);
	close_register_tag();
	
}

function send()
{
	include './views/send_view.php';
}

function about()
{
	include './views/about_view.php';	
}
?>