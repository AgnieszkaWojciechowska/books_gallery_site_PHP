<?php
$size = 20;
$font = './classes/arial.ttf';
$text = $watermark_string;
$angle = 5;
$folder = './DocumentRoot/images/thumb/';
$new_name = $folder.'watermark_'.$uploaded_filename;

if(!($img_watermark = new watermark($location, $file_type)))
	echo 'blad przy wczytywaniu obrazka do znaku wodnego <br />';

if(!($img_watermark -> shadow_text($size, $font, $text, $angle)))
	echo 'tworzenie znaku wodnego sie nie powiodlo <br />';

if($img_watermark -> save_watermark($file_type, $new_name))
	echo 'Znak wodny jest gotowy! <br />';
else
	echo 'Blad, tworzenie znaku wodnego sie nie powiodlo. <br />';
?>