<?php
	Class body
	{
		private $page;
		
		public function __construct()
		{
			$this->page = htmlspecialchars($_SERVER['SCRIPT_NAME']);
		}
		
		
		
		public function show_top ($adress = '.', $title = 'Szybkie czytanie')
		{ 
			require_once $adress.'/classes/functions.php';

			$db = get_db();
			
			
			?>
			
				<!DOCTYPE HTML>
				<html lang="pl-PL">
					<head>
						<title><?php echo $title; ?></title>
						<meta name="description" content="Projekt HiH nr 1, ver. 20151116" />
						<meta name="keywords" content="HTML,CSS,HiH, WETI, PG, PROJEKT1">
						
						<meta charset="UTF-8" />
						<meta name="author" content="Agnieszka Wojciechowska">
						
						<meta name="viewport" content="width=device-width, initial-scale=1.0" />
						
						<script src="./web/static/js/jquery.js"></script> 
						<script src="./web/static/js/jquery-ui.js"></script>       
						<script src="./web/static/js/script.js"></script>
						
						<link rel="Stylesheet" href="./web/static/css/Style.css" />
						<link rel="Stylesheet" href="./web/static/css/jquery-ui.css" />
						<link rel="shortcut icon" href="./web/static/favicon.ico" type="image/x-icon">
					</head>
					<body>
						 <div id="dokument">
							<div id="naglowek">
								<h1>Szybkie czytanie</h1>
								<h4>Czytanie książek to najpiękniejsza zabawa jaką sobie ludzkość wymyśliła.<br />W.Szymborska</h4>
							</div>    
							<a name="dogory"></a>	
							<div>
								<?php if(isset($_SESSION['user_id'])):
										$id = $_SESSION['user_id'];
										$user = $db->users->findOne(['_id' => new MongoId($id)]);
									?>
									<div>
										<form action="front_controller.php?action=/logout" enctype="text/plain" method="post">
											<label>
												<div class="in_log">
													<div class="log" >
														<input type="submit" value="Wyloguj"/>
													</div>
													<div class="log log_txt" >
														<label>Witaj, <?= $user['login']; ?></label>
													</div>
												</div>
											</label>
										</form>
									</div>
								<?php else: ?>
									<div>
										<label>
											<div class="in_log">
												<div class="log" >
													<a href="front_controller.php?action=/register"><input  type="button" value="Zarejestruj się!" /></a>
												</div>
												<div class="log" >
													<a href="front_controller.php?action=/log-in"><input  type="button" value="Zaloguj się!" /></a>
												</div>
												<div class="log log_txt" >
													<label>Witaj, gościu!</label>
												</div>
											</div>
										</label>
									</div>
								<?php endif ?>								
							</div>
							<div>
								<ol id="menu">
									<li><a href="front_controller.php?action=/">Szybkie czytanie</a></li>
									<li>
										<a href="#">Jak trenować?</a>
										<ul>
											<li><a href="front_controller.php?action=/begining">Jak zacząć?</a></li>
											<li><a href="front_controller.php?action=/top10">TOP 10</a></li>                     
											<li><a href="front_controller.php?action=/gallery">Galeria</a></li>
										<?php if (isset($_SESSION['user_id'])): ?>               
											<li><a href="front_controller.php?action=/user-gallery">Galeria użytkownika</a></li>
										<?php endif ?>
										</ul>
									</li>
									<li>
										<a href="#">Kontakt</a>
										<ul>                        
											<li><a href="front_controller.php?action=/send">Zadaj pytanie</a></li>
											<li><a href="front_controller.php?action=/about">O projekcie</a></li>  
										</ul>                
									</li>
								</ol>
							</div>
							<div id="tlo">
			<?php
					
		}
		
		public function show_bottom()
		{
			?>
							<a href="#dogory" class="button right" data-toggle="tooltip" data-placement="top" title="Hooray!">Do góry</a>
							</div>
						<footer>
							<h6>Szybkie czytanie &emsp;&emsp;&emsp; Agnieszka Wojciechowska &emsp;&emsp; indeks 160439</h6>
						</footer>
						</div>
					</body>
				</html>
			<?php
		}
		
		public function fieldset_top($text)
		{
			?>
				<br />
				<fieldset>
					<legend><?=$text?></legend>
			<?php
		}
		
		public function upload_status_bottom()
		{
			?>
				<br /><br />
				<div class="left"><a href="front_controller.php?action=/gallery"><input  type="button" value="powrót do galerii" /></a></div>
				<div class="right"><a href="front_controller.php?action=/upload"><input  type="button" value="nowe zdjecie" /></a></div>
				</fieldset>	
			<?php
		}
		
		public function picture_checked_top($do)
		{
			?>
				<br />
				<fieldset>
					<legend><?= $do ?> wybrane zdjęcia:</legend>
			<?php
		}
		
		public function fieldset_bottom()
		{
			?>
				</fieldset>	
			<?php
		}
		
		public function post_gallery_picture($path, $img, $checkbox = null, $gallery = null)
		{
			require_once 'functions.php';

			$db = get_db();
			$pic = get_pic_by_id($img);
			?>
			<fieldset class="in_line" >
				<?php
					if($checkbox == 'checkbox')
					{ 
						?>
							<input type="checkbox" name="<?= $pic['_id']; ?>" value="<?= $pic['_id']; ?>" 
								<?php if($gallery == 'def'):
									echo (isset($_SESSION[htmlspecialchars($pic['_id'])]) ? ' checked="checked"' : ''); 
								endif?>
							/><br/><br/>
						<?php 
					}
				?>
					<a href="<?php echo $path.'watermark_'.$pic['file']; ?>">
						<img src="<?php echo $path.'small_'.$pic['file']; ?>" alt="gallery image">
					</a><br>
					<br />
					<table>
						<tr>
							<th>Autor</th>
							<td><?= $pic['autor'] ?></td>
						</tr>
						<tr>
							<th>Tytuł</th>
							<td><?= $pic['title'] ?></td>						
						</tr>
						<tr>
							<th>Prywatność</th>
							<td><?= $pic['settings'] ?></td>
						</tr>
						<tr><td colspan=2 ><a href="front_controller.php?id=<?= $pic['_id'] ?>&action=/delete-img">usuń</a></tr>
					</table>
				</fieldset>
			<?php
		}
		
		public function upload_view_up()
		{ ?>
			<br/>
			<form action="front_controller.php?action=/image-process" method="POST" ENCTYPE="multipart/form-data">
			<input type="hidden" name="id" value="<?= $picture['_id']?>" />
			<fieldset>
				<legend>Załaduj plik JPEG lub PNG o wielkosci do 1MB:</legend>
					<label><span><b>Plik: </b></span><span><input type="file" name="plik" required/></span><br /></label><br /> 
					<label><span><b>Znak wodny: </b></span><span><input type="text" name="watermark" title="utwórz krótki tekst" required /></span><br /></label><br />
					<label><span><b>Tytuł: </b></span><span><input type="text" name="title" value="<?= $picture['title']?>" required /></span><br /></label>
		<?php
		}
		
		public function logged_upload_view($user)
		{	?>
			<label><span><b>Autor: </b></span><span><input type="text" name="autor" value="<?= $user ?>" readonly="readonly" required /></span><br /></label>
			<label>
				<span>Ustawienia prywatności: </span>
				   
				<span><input type="radio" name="settings" value="prywatne" checked />prywatne
				<input type="radio" name="settings" value="publiczne"/>publiczne</span>
				   
			</label><br />
			<?php
		}
		
		public function close_register_tag()
		{
			?>
			</h5>
			<?php
		}
		
		public function guest_upload_view()
		{	?>
			<label><span><b>Autor: </b></span><span><input type="text" name="autor" value="<?= $picture['autor'] ?>" required /></span><br /></label>
			<label>
				<span>Ustawienia prywatności: </span>
				
				<span><input type="radio" name="settings" value="prywatne" disabled="disabled" />prywatne
				<input type="radio" name="settings" value="publiczne" readonly="readonly" checked />publiczne</span>
			</label><br />
			<?php
		}
		
		public function upload_view_down()
		{	?>
			<br />
			<div class="left"><a href="front_controller.php?action=/gallery"><input  type="button" value="ANULUJ" /></a></div>
			<div class="right"><input type="submit" value="Wyślij plik" /></div>
			</fieldset>
		</form>
		<?php
		}
		
		public function manual_search_button()
		{	?>
			<div class="center"><a href="front_controller.php?action=/gallery"><input type="button" value="powrót do galerii"></a></div>
			<div class="center"><a href="front_controller.php?action=/search"><input type="button" value="powrót do wyszukiwarki"></a></div>
			<?php
		}
		
	}

?>