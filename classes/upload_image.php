<?php
$uploaded_filename = trim(str_replace(" ","_", $filename));
$location = './DocumentRoot/images/'.$uploaded_filename;
$max_rozmiar = 1048576;

function check_file_type($file_type)
{
	switch($file_type)
		{
			case 'image/jpg':
			case 'image/jpeg':
			case 'image/png':
				return true;
				break;
			default:
				return false;
				break;
		}
}

function save_file ($tmp_filename, $uploaded_filename, $location)
{
	if(is_uploaded_file($tmp_filename))
	{
		if(move_uploaded_file($tmp_filename, $location))
		{
			echo 'Plik zostal zaladowany!  <br />';
			return true;
		}
		else
		{
			echo 'Nie udalo sie skopiowac pliku do katalogu. <br />';
			return false;
		}
	}
	else
	{
		echo 'Mozliwy atak podczas przesylania pliku. <br /> Plik nie zostal zapisany.';
		return false;	
	}
}


?>