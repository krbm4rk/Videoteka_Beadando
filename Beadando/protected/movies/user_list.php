
	<?php 
 if(array_key_exists('d', $_GET) && !empty($_GET['d'])) { $query = "UPDATE movies SET kolcsonozve='Kölcsönözve' WHERE id = :id";
		$params = [':id' => $_GET['d']];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) {
			echo "Hiba kölcsönzés közben!";
		}
}
?>

	<?php 
 if(array_key_exists('s', $_GET) && !empty($_GET['s'])) { $query = "UPDATE movies SET kolcsonozve='Kölcsönözhető' WHERE id = :id";
		$params = [':id' => $_GET['s']];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) {
			echo "Hiba visszaadás közben!";
		}
}
?>
	<?php 
	$query = "SELECT id,kolcsonozve, nev, mufaj, evszam, rendezo FROM movies";
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
					<th scope="col">Kölcsönzés</th>
					<th scope="col">Név</th>
					<th scope="col">Műfaj</th>
					<th scope="col">Évszám</th>
					<th scope="col">Rendező</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($movies as $m) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$m['kolcsonozve'] ?></td>
						<td><?=$m['nev'] ?></td>
						<td><?=$m['mufaj'] ?></td>
						<td><?=$m['evszam'] ?></td>
						<td><?=$m['rendezo'] ?></td>
						<td><a href="?P=user_list_movies&d=<?=$m['id'] ?>">Film kölcsönzése</a></td>
						<td><a href="?P=user_list_movies&s=<?=$m['id'] ?>">Film visszaadása</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
<?php endif; ?>