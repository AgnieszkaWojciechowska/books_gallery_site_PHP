<br/>
<form method="post">
<fieldset>
    <div class="center">
	<label class="center"><b><br/>Czy usunąć zdjęcie: <?= $picture['title'] ?>?</b></label><br/><br/>
	<label>autor: <?= $picture['autor'] ?></label><br/><br/>
	</div>
  
    <input type="hidden" name="id" value="<?= $picture['_id'] ?>">

    <div>
       <div class="left"><a href="front_controller.php?action=/gallery"><input  type="button" value="ANULUJ" /></a></div>
		<div class="right"><input type="submit" value="Potwierdź"/></div>
    </div>
	</fieldset>
</form>
<h5 class="center">