<?php

Class gallery
{
	public $path;
	
	public function __construct()
	{
		
	}
	
	public function set_path($path)
	{
		$this->path = $path;
	}
	
	private function get_directory($path)
	{
		return scandir($path);
	}
	
	public function get_images($extensions = array('jpg', 'png'))
	{
		$images = $this->get_directory($this->path);
	
		foreach($images as $index => $image)
		{
			$extension = strtolower(end(explode('.', $image)));
			if(!in_array($extension, $extensions))
			{
				unset($images[$index]);
			}
			else
			{				
				$images[$index] = array
				(
					'small' => $this->path . 'thumb/small_' . $image,
					'watermark' => $this->path . 'thumb/watermark_' . $image
				);
			
				
			}
		}
		return (count($images)) ? $images : false;
	}
}

?>