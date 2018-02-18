<?php if (!isset($_SESSION['user_id'])): ?>
	<br/>
	<form method="POST">
		<fieldset>
			<legend>Logowanie:</legend>
				<input type="hidden" name="url" value="front_controller.php?action=/" required/>
				<label><span><b>Login: </b></span><span><input type="text" name="login" required/></span><br /></label><br /> 
				<label><span><b>Hasło: </b></span><span><input type="password" name="haslo"  required /></span><br /></label>
			<br />
			<div class="left">
			<label>Nie masz jeszcze konta?</label><br/><br/>
			<a href="register.php"><input  type="button" value="Zarejestruj się!" /></a></div>
			<div class="right"><br/><input type="submit" value="Zaloguj" /></div>
		</fieldset>
	</form>	
<?php else: ?>
		<fieldset>
			<legend>Logowanie:</legend>
				<label>Użytkownik zalogowany.</label>
		</fieldset>
		<?php
		$url = 'front_controller.php?action=/';
		echo '<html><head><meta http-equiv="refresh" content="1;url=' . $url . '"/></head><body>Redirecting to ' . $url . '</body></html>';
		?>
				
<?php endif ?>
<h5 class="center">