<br/>
	<form method="POST">
			<fieldset>
				<legend>Rejestracja:</legend>
					<label><span><b>Login: </b></span><span><input type="text" name="login" required/></span><br /></label><br /> 
					<label><span><b>adres e-mail: </b></span><span><input type="e-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="e-mail" required /></span><br /></label><br />
					<label><span><b>Hasło: </b></span><span><input type="password" name="haslo"  required /></span><br /></label>
					<label><span><b>Powtórz hasło: </b></span><span><input type="password" name="p_haslo"  required /></span><br /></label>
				<br />
				<div class="left">
				<label>Masz już konto?</label><br/><br/>
				<a href="front_controller.php?action=/log-in"><input  type="button" value="Zaloguj się!" /></a></div>
				<div class="right"><br/><input type="submit" value="Zarejestruj się" /></div>
			</fieldset>
		</form>	
<h5 class="center">
