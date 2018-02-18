<?php

$picture = [
    'title' => null,
    'autor' => null,
	'file' => null,
	'settings' => null,
    '_id' => null
];



if ($_SERVER['REQUEST_METHOD'] === 'POST' ) 
	{
		if (!empty($_POST['title']) && !empty($_POST['autor']) && !empty($_POST['settings']) && !empty($_FILES['plik']['name']))
			{
				$picture = [
					'title' => $_POST['title'],
					'autor' => $_POST['autor'],
					'autor_id' => $_SESSION['user_id'],
					'file' => $uploaded_filename,
					'settings' => $_POST['settings']
				];
				
				save_picture_data($_POST['id'], $picture);
			}
	}
else 
	{
		if (!empty($_GET['id'])) 
		{
			$id = $_GET['id'];
			$picture = $db->picture->findOne(['_id' => new MongoId($id)]);
			
		}
	}

?>