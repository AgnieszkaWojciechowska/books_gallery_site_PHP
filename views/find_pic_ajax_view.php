<div class="center">
	<h3>Wyszukiwarka zdjęć</h3>
		<form action="front_controller.php?action=/manual-search" method="POST" ENCTYPE="multipart/form-data">
		<input name="q" type="text" onkeyup="showHint(this.value)"/>
		<input type="submit" value="Szukaj" />
		</form><br />
	<div id="galeria">
		<p class="center" id="txtHint"></p>
	</div>
</div>

<br/><br/>
<div class="center"><a href="front_controller.php?action=/gallery"><input type="button" value="powrót do galerii"></a></div>
