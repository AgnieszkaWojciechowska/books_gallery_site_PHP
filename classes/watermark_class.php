<?php 

Class watermark
{
	private $im_watermark;
	private $width;
	private $height;
	
	public function __construct($file, $file_type)
	{
		$this->im_watermark = $this->openImage($file, $file_type);
		
		$this->width = imagesx($this->im_watermark);
		$this->height = imagesy($this->im_watermark);
	}
	
	private function openImage($file, $file_type)
	{
		switch($file_type)
		{
			case 'image/jpg':
			case 'image/jpeg':
				$img = @imagecreatefromjpeg($file);
				break;
			case 'image/png':
				$img = @imagecreatefrompng($file);
				break;
			default:
				$img = false;
				break;
		}
		return $img;
	}
	
	private function calculateTextBox($font_size, $font_angle, $font_file, $text) 
	{
		$box = imagettfbbox($font_size, $font_angle, $font_file, $text);

		$min_x = min(array($box[0], $box[2], $box[4], $box[6]));
		$max_x = max(array($box[0], $box[2], $box[4], $box[6]));
		$min_y = min(array($box[1], $box[3], $box[5], $box[7]));
		$max_y = max(array($box[1], $box[3], $box[5], $box[7]));

		return array(
			'left' => ($min_x >= -1) ? -abs($min_x + 1) : abs($min_x + 2),
			'top' => abs($min_y),
			'width' => $max_x - $min_x,
			'height' => $max_y - $min_y,
			'box' => $box
		);
}

	public function shadow_text ($size, $font, $text, $angle)
	{
		
			$stamp = imagecreatetruecolor($this->width, $this->height);
			
			$white = imagecolorallocate($stamp, 255, 255, 255);
			$grey = imagecolorallocate($stamp, 128, 128, 128);
			$black = imagecolorallocate($stamp, 0, 0, 0);
			$trans_colour = imagecolortransparent($stamp, $black);
			
			imagefill($stamp, 0, 0, $trans_colour);
			
			imagettftext($stamp, $size, $angle, 10, $this->height, $white, $font, $text);

			$marge_right = 0;
			$marge_bottom = 20;
			$sx = imagesx($stamp);
			$sy = imagesy($stamp);
			if(imagecopymerge($this->im_watermark, $stamp, 5, imagesy($this->im_watermark)-$sy-$marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 60))
				return true;				
	}
	
	public function save_watermark($file_type, $new_name, $imageQuality="100")
	{
		switch($file_type)
		{
			case 'image/jpg':
			case 'image/jpeg':
				$watermarked = imagejpeg($this->im_watermark, $new_name, $imageQuality);
				break;
			case 'image/png':
			{
				$scaleQuality = round(($imageQuality/100)*9);
				
					//invert quality setting as 0 is best
					$inverScaleQuality = 9 - $sacleQuality;
					$watermarked = imagepng($this->im_watermark, $new_name, $inverScaleQuality);
				break;
			}
			default:
				$watermarked = false;
				break;
		}
		return $watermarked;
	}
}
?>