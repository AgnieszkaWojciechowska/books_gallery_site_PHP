<h3 class="center">TOP 10, czyli...</h3>
		<h5 class="center">Polecane książkowe nowości wydawnicze do nauki szybkiego czytania:</h5>

		<table>
			<tr> <th>Tytuł</th> <th>Tytuł oryginału</th> <th>Autor</th> <th>Cykl</th> <th>Wydawnictwo</th> <th>Data wydania</th> <th>Gatunek</th> <th>ISBN</th> <th>Liczba stron</th> <th>Język</th> <th>Ocena /10</th> </tr>
			<tr> <td>Król gry</td> <td>Il re dei giochi</td> <td>Marco Malvaldi</td> <td>Bar Lume (tom&nbsp;3)</td> <td>Noir sur Blanc</td> <td>5 listopada 2015</td> <td>thriller/sensacja/kryminał</td> <td>9788373925601</td> <td>210</td> <td>Polski</td> <td>6,5</td> </tr>
			<tr> <td>Zagadka Sary Tell</td> <td>Lotus Blues</td> <td>Kristina Ohlsson</td> <td>-</td> <td>Prószyński i S-ka</td> <td>5 listopada 2015</td> <td>thriller/sensacja/kryminał</td> <td>9788380691728</td> <td>?</td> <td>Polski</td> <td>?</td> </tr>
			<tr> <td>Zaginiony</td> <td>Savnet</td> <td>Michael Katz Krefeld</td> <td>Ravn (tom&nbsp;2)</td> <td>Wydawnictwo Literackie</td> <td>5 listopada 2015</td> <td>thriller/sensacja/kryminał</td> <td>9788308060445</td> <td>417</td> <td>Polski</td> <td>7,57</td> </tr>
			<tr> <td>Tajemnica grobowca</td> <td>The Charlemagne Pursuit</td> <td>Steve Berry</td> <td>Cotton Malone (tom&nbsp;4)</td> <td>Sonia Draga</td> <td>4 listopada 2015</td> <td>thriller/sensacja/kryminał</td> <td>9788379995271</td> <td>576</td> <td>Polski</td> <td>7,01</td> </tr>
			<tr> <td>Sedinum. Wiadomość z&nbsp;podziemi</td> <td>?</td> <td>Leszek Herman</td> <td>-</td> <td>Muza</td> <td>4 listopada 2015</td> <td>thriller/sensacja/kryminał</td> <td>9788328701120</td> <td>800</td> <td>Polski</td> <td>8,0</td> </tr>
			<tr> <td>Gwiazdozbiór</td> <td>?</td> <td>Marta Zaborowska</td> <td>CZARNA SERIA: Julia&nbsp;Krawiec (tom&nbsp;3)</td> <td>Czarna Owca</td> <td>4 listopada 2015</td> <td>thriller/sensacja/kryminał</td> <td>9788380152397</td> <td>520</td> <td>Polski</td> <td>?</td> </tr>
			<tr> <td>Bazar złych snów</td> <td>The Bazaar of Bad Dreams</td> <td>Stephen King</td> <td>-</td> <td>Prószyński i S-ka</td> <td>5 listopada 2015</td> <td>horror</td> <td>9788380691742</td> <td>672</td> <td>Polski</td> <td>8,0</td> </tr>
			<tr> <td>Cztery po północy</td> <td>Four past Midnight</td> <td>Stephen King</td> <td>-</td> <td>Albatros</td> <td>30 października 2015</td> <td>horror</td> <td>9788379856657</td> <td>832</td> <td>Polski</td> <td>6,96</td> </tr>
			<tr> <td>Wizja</td> <td>The Vision</td> <td>Dean Koontz</td> <td>-</td> <td>Replika</td> <td>22 września 2015</td> <td>horror</td> <td>9788376744742</td> <td>320</td> <td>Polski</td> <td>6,44</td> </tr>
			<tr> <td>Kosogłos</td> <td>Mockingjay</td> <td>Suzanne Collins</td> <td>Igrzyska śmierci (tom&nbsp;3)</td> <td>Media Rodzina</td> <td>listopad 2015</td> <td>literatura młodzieżowa</td> <td>9788380081536</td> <td>376</td> <td>Polski</td> <td>8,0</td> </tr>
		</table>

		<p class="center">Czytałeś/aś którąś z powyższych pozycji? Weź udział w naszym konkursie!<br />&emsp;&emsp;Oceń książkę korzystając z poniższego formularza i wygrywaj nagrody!</p>
		
		<?php if (isset($_SESSION['user_id'])): ?>
		<form onreset="if (!confirm('Czy na pewno chcesz wyczyścić cały formularz?')) return false" >
			<div>                    
				<fieldset>
					<legend>Dodaj opinię:</legend>
					<label><span>Podaj swoje imię: </span><span><input type="text" name="imię" placeholder="Wpisz twoje imię" required /></span></label><br />
					<label><span>Podaj swoje nazwisko: </span><span><input type="text" name="nazwisko" placeholder="Wpisz twoje nazwisko" required /></span></label><br />
					<p><label><span>Podaj nr telefonu: </span><span><input type="tel" name="tel" placeholder="Wpisz twój nr telefonu" pattern="[0-9]{9}" title="Wprowadź 9 cyfrowy numer" required /></span></label></p><br />
					<label><span>Podaj e-mail: </span><span><input type="email" name="email" placeholder="Wpisz twój e-mail" required /></span></label><br />
					<label><span>Podaj hasło: </span><span><input type="password" name="hasło" placeholder="Wpisz twoje hasło" title="Tworzysz hasło tylko na potrzeby konkursu. Zapamiętaj je, ponieważ będzie potrzebne jak wygrasz!" required /></span></label><br />

					<label>
						<span>Płeć: </span>
						   
						<span><input type="radio" name="K_M" checked />Kobieta<input type="radio" name="K_M" />Mężczyzna</span>
						   
					</label><br /><br />
					<label>
						<span>Tytuł książki: </span>
						<span>
							<select name="tytuł" required>
								<option>Król gry</option>
								<option>Zagadka Sary Tell</option>
								<option>Zaginiony</option>
								<option>Tajemnica grobowca</option>
								<option>Sedinum. Wiadomość z podziemi</option>
								<option>Gwiazdozbiór</option>
								<option>Bazar złych snów</option>
								<option>Cztery po północy</option>
								<option>Wizja</option>
								<option>Kosogłos</option>
							</select>
						</span>
					</label><br />

					<label for="spinner"><span>Twoja ocena: </span><span><input id="spinner" type="number" min="1" max="10" title="Oceń w skali od 1 do 10." name="value" required />&emsp;</span></label><br /> 

					<label><span>Twoja opinia:</span><span> <textarea name="opinia" placeholder="Opinia" title="Twoja opinia powinna zawierać max 300 znaków" maxlength="300" required></textarea></span></label><br />
					 
					<br /><br />

					<div align="center">
						<label>
							<input type="checkbox" checked="checked" required /><br /><br/>Zgadzam się na przetwarzanie moich danych osobowych.<br /><br />
							<br /><br/><br/>
							<br /><br/>
							<input type="submit" value="Wyślij" class="none" />
							<input type="reset" value="Wyczyść" class="none" />
						</label>
					</div>
				</fieldset>
			</div>
		</form>
	<?php else: ?>
		<p class="center" >Zaloguj się, aby wziąć udział w konkursie.</p>
		<form method="POST">
			<fieldset>
				<legend>Logowanie:</legend>
					<input type="hidden" name="url" value="front_controller.php?action=/top10" required/>
					<label><span><b>Login: </b></span><span><input type="text" name="login" required/></span><br /></label><br /> 
					<label><span><b>Hasło: </b></span><span><input type="password" name="haslo"  required /></span><br /></label>
				<br />
				<div class="left">
				<label>Nie masz jeszcze konta?</label><br/><br/>
				<a href="register.php"><input  type="button" value="Zarejestruj się!" /></a></div>
				<div class="right"><br/><input type="submit" value="Zaloguj" /></div>
			</fieldset>
		</form>	
	<?php endif ?>
		</br></br>