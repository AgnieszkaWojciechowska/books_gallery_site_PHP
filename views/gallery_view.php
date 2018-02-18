<h3 class="center">Galeria</h3>
		<?php if($picture): ?>
			<div class="center" id="galeria">
				<form action="front_controller.php?action=/check-picture" method="POST" ENCTYPE="multipart/form-data">
					<?php
					 foreach ($picture as $pic): ?>
					
						<?php if (isset($_SESSION['user_id'])): ?>
							<?php if(($pic['settings'] == 'prywatne') && ($pic['autor_id'] == $_SESSION['user_id']))
								{
									$body -> post_gallery_picture($path, $pic['_id'], 'checkbox', 'def');
								}
							 ?>
						<?php endif ?>
						<?php if(( $pic['settings']) == 'publiczne')
								{
									$body -> post_gallery_picture($path, $pic['_id'], 'checkbox', 'def');
								}
						?>
					<?php endforeach ?>
					<div class="center"><input type="submit" value="zapamiętaj wybrane zdjęcia"></div><br/>
					
				</form>
			</div>
		<?php else: ?>
			<p>Galeria jest pusta.</p>
		<?php endif ?>
			<br /><br />
			
		<?php if (isset($_SESSION['user_id'])): ?> 
		<div class="center"><a href="front_controller.php?action=/user-gallery"><input type="button" value="galeria użytkownika"></a></div>
		<?php endif ?>
		
		<div class="center"><a href="front_controller.php?action=/search"><input type="button" value="szukaj zdjęć"></a></div>

		
		<div class="center"><a href="front_controller.php?action=/upload"><input type="button" value="nowe zdjęcie"></a></div>
	<br/>
