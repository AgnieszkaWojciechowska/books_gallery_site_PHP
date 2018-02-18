<?php
function get_db()
	{
		$mongo = new MongoClient(
			"mongodb://localhost:27017/",
			[
				'username' => 'wai_web',
				'password' => 'w@i_w3b',
				'db' => 'wai',
			]);

		$db = $mongo->wai;

		return $db;
	}
	
function save_picture_data($id, $picture)
{
	$db = get_db();
	if($id == null)
		$db->picture->insert($picture);
	else
		$db->picture->update(['_id' => new MongoId($id)], $picture);
	return true;
}

function get_pictures()
	{
		$db = get_db();
		$picture = $db->picture->find();
		
		return $picture;
	}
	
function get_pic_by_id($img)
	{
		$db = get_db();
		$picture = $db->picture->findOne(['_id' => new MongoId($img)]);
		
		return $picture;
	}

function find_user($us)
	{
		$db = get_db();
		$user = $db->users->findOne($us);
		
		return $user;
	}
	
function find_user_by_id($us_id)
{
	$db = get_db();
	$user = $db->users->findOne(['_id' => new MongoId($us_id)]);
	return $user;
}
	
function register($user)
	{
		$db = get_db();
		if($db->users->insert($user))
			return true;
		else
			return false;
	}
	
function register_action($login, $mail, $password, $repeat_password)
{
	$user = [
		'login' => null,
		'password' => null,
		'mail' => null
	];
	
	if (!empty($login) && !empty($mail) 
		&& !empty($password) && !empty($repeat_password))
	{
		$us = [
			'login' => $login
		];

		$user = find_user($us);
		
		if($user)
		{
			echo 'Login zajęty';
			
		}
		else
		{
			if($password === $repeat_password)
			{
				$hash = password_hash($password, PASSWORD_DEFAULT);
				
				$user = [
					'login' => $login,
					'password' => $hash,
					'mail' => $mail
				];
				
				if(register($user))
				{
					$url = 'front_controller.php?action=/log-in';
					echo '<html><head><meta http-equiv="refresh" content="1;url=' . $url . '"/></head><body>Redirecting to ' . $url . '</body></html>';
					echo ' Rejstracja przebiegła pomyślnie.';
				}
				else
					http_response_code(404);
			}
			else
			{
				echo 'Hasła do siebie nie pasują';
				
			}
		}
	}
}
	
function log_in_action($login, $password, $url)
{
	$us = [
		'login' => null
	];
	
	$us = [
        'login' => $login
    ];

    $user = find_user($us);

    if ($user) 
	{ 
			if($user !== null && password_verify($password, $user['password']))
			{
				$session = $user['_id'];
				return $session;
			}
			else
			{
				echo "Nieznany login lub hasło!\n";
			}
	}
	else
	{
		echo "Niepoprawny login lub hasło!\n";
	}
}
	
function user_logout()
{
	session_unset();
	session_destroy();
}

function picture_checking()
{
	$db = get_db();
	$picture = get_pictures();
	if ($_SERVER["REQUEST_METHOD"] === 'POST') 
	{
		foreach ($picture as $pic)
		{
			$id = $pic['_id'];
			unset($_SESSION[htmlspecialchars($id)]);
			$img = $_POST[htmlspecialchars($id)];
			
			if($img == $id)
			{
				$_SESSION[htmlspecialchars($id)] = $id;
				echo '<span>'.$pic['title'].'</span>';
				echo '<span>- Zapamiętano zaznaczone zdjęcie. </span><br/>';
			}
			else {}
		}
	$url = 'front_controller.php?action=/gallery';
	echo '<html><head><meta http-equiv="refresh" content="1;url=' . $url . '"/></head><body>Redirecting to ' . $url . '</body></html>';
	}
}

function picture_unchecking()
{
	$db = get_db();
	$picture = get_pictures();
	if ($_SERVER["REQUEST_METHOD"] === 'POST') 
	{
		foreach ($picture as $pic)
		{
			$id = $pic['_id'];
			$img = $_POST[htmlspecialchars($id)];
			if(isset($img))
			{
				unset($_SESSION[htmlspecialchars($id)]);
				echo '<span>'.$pic['title'].'</span>';
				echo '<span> - Usunieto z zapamiętanych. </span><br/>';
			}
		}
		$url = 'front_controller.php?action=/user-gallery';
		echo '<html><head><meta http-equiv="refresh" content="1;url=' . $url . '"/></head><body>Redirecting to ' . $url . '</body></html>';
	}	
}

function image_processing($tmp_filename, $filename, $file_size, $file_type, $error, $watermark_string)
{
	$db = get_db();
	include 'upload_image.php';
	include 'watermark_class.php';
	include 'resize_class.php';

	if (is_uploaded_file($tmp_filename)) 
		{
			if ($file_size > $max_rozmiar) 
				{
					echo 'Hej Błąd! Plik jest za duży! (max. 1MB)';
					if(!check_file_type($file_type))
					{
						echo 'Niepoprawny format pliku. <br /> Dozwolone ladowanie pliku typu JPG lub PNG.';
					}
				} 
			else 
				{
					echo 'Odebrano plik. Początkowa nazwa: ' . $uploaded_filename;
					echo '<br/>';
					if (check_file_type($file_type)) 
						{
							echo 'Typ: ' . $file_type . '<br/>';
							save_file ($tmp_filename, $uploaded_filename, $location);
							
							// watermark						
							include 'watermark_image.php';
							
							// miniaturka
							include 'resize_image.php';
							
							include 'show_gallery_small.php';
							
							include 'author_n_title.php';
							return true;
							
											
						}
					else
						{
							echo 'Niepoprawny format pliku. <br /> Dozwolone ladowanie pliku typu JPG lub PNG.';
						}
				}
			 
		}
	else 
		{
			echo 'Błąd przy przesyłaniu danych!<br />';
			echo 'Błąd! Plik jest za duży! (max. 1MB)<br />';
			echo 'Typ: ' . $file_type . '<br/>';
			if(check_file_type($file_type) == false)
			{
				echo 'Niepoprawny format pliku. <br /> Dozwolone ladowanie pliku typu JPG lub PNG.';
			}
		}
}

function author_n_title($id, $title, $autor, $session_u_id, $uploaded_filename, $settings)
{
	$db = get_db();
	$picture = [
		'title' => null,
		'autor' => null,
		'file' => null,
		'settings' => null,
		'_id' => null
	];

	$picture = [
		'title' => $title,
		'autor' => $autor,
		'autor_id' => $session_u_id,
		'file' => $uploaded_filename,
		'settings' => $settings 
	];
	
	save_picture_data($id, $picture);	
}

function image_delete($id)
{
	$db = get_db();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') 
	{
		$db->picture->remove(['_id' => new MongoId($id)]);
		
		$url = 'front_controller.php?action=/gallery';
		echo '<html><head><meta http-equiv="refresh" content="1;url=' . $url . '"/></head><body>Redirecting to ' . $url . '</body></html>';
	}
}

function user_logged($session)
{
	if (isset($session))
	{
		$us_id = $session;
		$user = find_user($us_id);
		return $user;
	}
	else
		return false;
}

function search_pic ($q)
{
	$db = get_db();
	$picture = get_pictures();
	if($q != "")
	{	
		foreach ($picture as $pic)
		{
			if( strpos($pic['title'],$q) === false ){}
			else
			{
				if(( $pic['settings']) == 'publiczne')
				{ 
					return $pic['_id'];
				} 
				if (isset($_SESSION['user_id']))
				{
					if(($pic['settings'] == 'prywatne') && ($pic['autor_id'] == $_SESSION['user_id']))
					{ 
						return $pic['_id'];
					} 
				} 
			}
		}
	}
}
?>