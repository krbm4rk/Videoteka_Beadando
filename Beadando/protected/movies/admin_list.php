<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>

<?php else : ?>

		<?php 
 if(array_key_exists('d', $_GET) && !empty($_GET['d'])) { $query = "DELETE FROM movies WHERE id = :id";
		$params = [':id' => $_GET['d']];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) {
			echo "Hiba törlés közben!";
		}
}
?>


	<?php 
	$query = "SELECT id,nev, mufaj, evszam, rendezo FROM movies";
	require_once DATABASE_CONTROLLER;
	$movies = getList($query);
	?>
	<?php if(count($movies) <= 0) : ?>
		<h1>Nem található egyetlen egy film sem az adatbázisban.</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Név</th>
					<th scope="col">Műfaj</th>
					<th scope="col">Évszám</th>
					<th scope="col">Rendező</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($movies as $m) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$m['nev'] ?></td>
						<td><?=$m['mufaj'] ?></td>
						<td><?=$m['evszam'] ?></td>
						<td><?=$m['rendezo'] ?></td>
						<td><a href="?P=admin_list_movies&d=<?=$m['id'] ?>">Film törlése</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
			<?php endif; ?>
<?php endif; ?>