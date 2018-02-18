<?php

if(!($resizeObj = new resize($location)))
	echo 'blad przy wczytywaniu obrazka do miniaturki <br />';

 
$resize_width = 200;
$resize_height = 125;
if(!($resizeObj -> resizeImage($resize_width, $resize_height)))
	echo 'blad przy zmniejszaniu obrazka <br />';
 
$new_name_s = $folder.'small_'.$uploaded_filename;
if($resizeObj -> saveImage($file_type, $new_name_s, 100))
	echo 'Miniaturka zapisana! <br />';
else
	echo 'Blad! Miniaturka nie zapisana. resizeimage.php pozdrawia <br />';

?>