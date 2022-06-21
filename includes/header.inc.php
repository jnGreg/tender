<nav class ="navbar navbar-light bg-success navbar-expand-lg">

			<a class="navbar-brand" href="index.php" ><h2 style="font-family: 'Garamond', cursive; font-size: 4.5rem; font-weight: 300; color: #003CB3;">Tender</h2> </a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu_glowne" aria-controls="menu_glowne" aria-expanded="false" aria-label="przelacznik_nawigacji"> 
				<span class="navbar-toggler-icon"> </span>
			</button>

			<div class="collapse navbar-collapse" id="menu_glowne">
				<ul class="navbar-nav ml-auto">
				<?php 
				if (isset ($_SESSION["userid"])) { ?>

					<li class="nav-item" active>
						<a class="nav-link" href="watched.php?view=list">
							Obserwowane
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="add.php">
							Dodaj ogłoszenie
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
						 aria-expanded="false" id="submenu" aria-haspopup="true">
							Moje konto (<?php echo $_SESSION["username"];?>)
						</a>

						<div class="dropdown-menu" aria-labeledby="submenu">
							<a class="dropdown-item" href="won.php?view=list" >
							Wygrane Ogłoszenia </a>
							<a class="dropdown-item" href="owned.php?view=list" >
									Moje Bieżące </a>
							<a class="dropdown-item" href="my_archive.php?view=list" >
							Moje Zakończone </a>
							<a class="dropdown-item" href="userInfo.php" >
							Dane Użytkownika </a>
							<a class="dropdown-item" href="includes/logout.inc.php" >
							Wyloguj </a>
						</div>
					</li>
				<?php }

				else { ?>
					<li class="nav-item">
						<a class="nav-link" href="login.php">
							Zaloguj
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php">
							Załóż Konto
						</a>
					</li>
					<?php
				}

				?>	
				</ul>
			</div>
		</nav>