<br/>
	<form action="front_controller.php?action=/image-process" method="POST" ENCTYPE="multipart/form-data">
			<input type="hidden" name="id" value="<?= $picture['_id']?>" />
			<fieldset>
				<legend>Załaduj plik JPEG lub PNG o wielkosci do 1MB:</legend>
					<label><span><b>Plik: </b></span><span><input type="file" name="plik" required/></span><br /></label><br /> 
					<label><span><b>Znak wodny: </b></span><span><input type="text" name="watermark" title="utwórz krótki tekst" required /></span><br /></label><br />
					<label><span><b>Tytuł: </b></span><span><input type="text" name="title" value="<?= $picture['title']?>" required /></span><br /></label>
				<?php if (isset($_SESSION['user_id'])): ?>  
					<?php 	$us_id = $_SESSION['user_id'];
							$user = find_user_by_id($us_id); ?>
					<label><span><b>Autor: </b></span><span><input type="text" name="autor" value="<?= $user['login'] ?>" readonly="readonly" required /></span><br /></label>
					<label>
						<span>Ustawienia prywatności: </span>
						   
						<span><input type="radio" name="settings" value="prywatne" checked />prywatne
						<input type="radio" name="settings" value="publiczne"/>publiczne</span>
						   
					</label><br />
				<?php else: ?>
					<label><span><b>Autor: </b></span><span><input type="text" name="autor" value="<?= $picture['autor'] ?>" required /></span><br /></label>
					<label>
						<span>Ustawienia prywatności: </span>
						
						<span><input type="radio" name="settings" value="prywatne" disabled="disabled" />prywatne
						<input type="radio" name="settings" value="publiczne" readonly="readonly" checked />publiczne</span>
					</label><br />
				<?php endif ?>
			<br />
			<div class="left"><a href="front_controller.php?action=/gallery"><input  type="button" value="ANULUJ" /></a></div>
			<div class="right"><input type="submit" value="Wyślij plik" /></div>
			</fieldset>
		</form>