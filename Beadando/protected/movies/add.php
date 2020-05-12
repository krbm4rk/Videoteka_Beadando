<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addMovie'])) {
		$postData = [
			'nev' => $_POST['nev'],
			'mufaj' => $_POST['mufaj'],
			'evszam' => $_POST['evszam'],
			'rendezo' => $_POST['rendezo']
		];

		if(empty($postData['nev']) || empty($postData['mufaj']) || empty($postData['evszam']) || empty($postData['rendezo'])) {
			echo "Hiányzó adat(ok)!";
		}
		 else {
			$query = "INSERT INTO movies (nev, mufaj, evszam, rendezo) VALUES (:nev, :mufaj, :evszam, :rendezo)";
			$params = [
				':nev' => $postData['nev'],
				':mufaj' => $postData['mufaj'],
				':evszam' => $postData['evszam'],
				':rendezo' => $postData['rendezo'],
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php');
		}
	}
	?>

	<form method="post" class="hozzaadas">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="FilmNev">Név</label>
				<input type="text" class="form-control" id="FilmNev" name="nev">
			</div>
			<div class="form-group col-md-6">
				<label for="FilmMufaj">Műfaj</label>
				<input type="text" class="form-control" id="FilmMufaj" name="mufaj">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="FilmEvszam">Évszám</label>
				<input type="text" class="form-control" id="FilmEvszam" name="evszam">
			</div>

			<div class="form-group col-md-6">
				<label for="FilmRendezo">Rendező</label>
				<input type="text" class="form-control" id="FilmRendezo" name="rendezo">
			</div>
		</div>

		<button type="submit" class="btn btn-primary" id="hozzaadasGomb" name="addMovie">Film hozzáadása</button>
	</form>
<?php endif; ?>