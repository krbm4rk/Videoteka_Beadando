<nav class="navbar navbar-expand-lg navigacio">
  <a class="navbar-brand oldalcim" href="">VIDEOTÉKA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Főoldal</a>

      <?php if(!IsUserLoggedIn()) : ?>

      	<a class="nav-item nav-link text-warning" href="index.php?P=login">Belépés</a>
      	<a class="nav-item nav-link text-danger" href="index.php?P=register">Regisztráció</a>

      <?php else : ?>

      	<a class="nav-item nav-link" href="index.php?P=admin_list_movies">Filmek listája(Admin)</a>
        <a class="nav-item nav-link" href="index.php?P=user_list_movies">Filmek listája</a>
      	<a class="nav-item nav-link" href="index.php?P=add_movies">Film hozzáadása(Admin)</a>
        <a class="nav-item nav-link" href="index.php?P=trailers">Előzetesek</a>
        <a class="nav-item nav-link" href="index.php?P=howto">Hogyan működik?</a>


      	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] > 1) : ?>

    <?php endif; ?>
		<a class="nav-item nav-link text-danger" href="index.php?P=logout">Kijelentkezés</a>
      <?php endif; ?>
    </div>
  </div>
</nav>