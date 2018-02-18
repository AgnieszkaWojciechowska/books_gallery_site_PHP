<?php
Class resize
{
	private $image;
	private $width;
	private $height;
	private $imageResized;
	
	public function __construct($filename)
	{
		$this->image = $this->openImage($filename);
		
		$this->width = imagesx($this->image);
		$this->height = imagesy($this->image);
	}

	
	private function openImage($file)
	{
		$extension = strtolower(strrchr($file, '.'));
		
		switch($extension)
		{
			case '.jpg':
			case '.jpeg':
				$img = @imagecreatefromjpeg($file);
				break;
			case '.png':
				$img = @imagecreatefrompng($file);
				break;
			default:
				$img = false;
				break;
		}
		return $img;
	}
	
	public function resizeImage($newWidth, $newHeight)
	{
		$this->imageResized = imagecreatetruecolor($newWidth, $newHeight);
		if(imagecopyresized($this->imageResized, $this->image, 0, 0, 0, 0, $newWidth, $newHeight, $this->width, $this->height))
			return true;
		else
		{
			echo 'imagecopyresambled doesnt work <br />';
			return false;
		}
		
	}
	
	public function saveImage($file_type, $savePath, $imageQuality="100")
	{
		if($file_type ==  'image/jpeg' || $file_type ==  'image/jpg')
		{
			if(imagejpeg($this->imageResized, $savePath, $imageQuality))
				return true;
			else
			{
				echo 'class: nie zapisano zmniejszonego obrazka jpg<br />';
				return false;
			}
		}
		else if ($file_type == 'image/png')
		{
			$scaleQuality = round(($imageQuality/100)*9);
				
				$inverScaleQuality = 9 - $sacleQuality;
				
				if (imagepng($this->imageResized, $savePath, $inverScaleQuality))
					return true;
				else
				{
					echo 'class: nie zapisano zmniejszonego obrazka png <br />';
					return false;
				}
		}
		else
		{
			echo 'nieznane rozszerzenie obrzka <br />';
			return false;
		}
		imagedestroy($this->imageResized);
	}
}
?>