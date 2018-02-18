<h3 class="center">Galeria użytkownika</h3>
		<?php if (isset($_SESSION['user_id'])): ?> 
			<?php  if($picture): ?>
			<div class="center" id="galeria">
			<form action="front_controller.php?action=/picture-uncheck" method="POST" ENCTYPE="multipart/form-data">
			
				<?php foreach($picture as $pic): ?>
					<?php $checked_pic = $_SESSION[htmlspecialchars($pic['_id'])];
						if (isset($checked_pic))
						{
							$body -> post_gallery_picture($path, $pic['_id'], 'checkbox');
						}
							
					?>
				<?php endforeach ?>
				<div class="center"><input type="submit" value="usuń zaznaczone"></div><br/>
				</form>	
			</div>
			<?php else: ?>
				Brak zdjęć w galerii.
			<?php endif ?>
		<br /><br />
		<div class="center"><a href="front_controller.php?action=/gallery"><input type="button" value="galeria ogólna"></a></div>
		<div class="center"><a href="front_controller.php?action=/search"><input type="button" value="szukaj zdjęć"></a></div>

		<div class="center"><a href="front_controller.php?action=/upload"><input type="button" value="nowe zdjęcie"></a></div>
	<?php else: ?>
		Zaloguj się!
	<?php endif ?>
	<br/>