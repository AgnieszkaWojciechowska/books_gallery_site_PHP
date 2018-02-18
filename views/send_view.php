<h3 class="center">Wyślij!</h3>

			<form action="mailto:s160439@student.pg.gda.pl?subject=Szybkie%czytanie" enctype="text/plain" method="post">
				<div>
					<fieldset>
						<legend>Zadaj pytanie</legend>
						<label><span>Podaj swoje imię: </span><span><input id="tooltip-1" type="text" name="imię" placeholder="Wpisz twoje imię" required /></span></label><br />
						<label><span>Podaj swoje nazwisko: </span><span><input type="text" name="nazwisko" placeholder="Wpisz twoje nazwisko" required /></span></label><br />
						<label><span>Podaj e-mail: </span><span><input type="email" name="email" placeholder="Wpisz twój e-mail" required /></span></label><br />
						<br />
						<br />
						<label>
							<span>Temat:</span>
							<span>
								<select name="temat" required>
									<option>Książki</option>
									<option>Treningi</option>
									<option>Kurs szybkiego czytania</option>
									<option>Konkurs</option>
									<option>Działanie strony - problemy</option>
									<option>Inny</option>
								</select>
							</span>
						</label><br /><br />
						<textarea name="message" placeholder="Wiadomość" class="send" required></textarea>
						<br />
						<input type="submit" value="Wyślij!" class="right"/>
                	</fieldset>
                </div>
			</form>