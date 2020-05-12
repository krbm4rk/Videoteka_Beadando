<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {

	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;

	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'movies/login.php' : header('Location: index.php'); break;

	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'movies/register.php' : header('Location: index.php'); break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;


	case 'admin_list_movies': IsUserLoggedIn() ? require_once PROTECTED_DIR.'movies/admin_list.php' : header('Location: index.php'); break;

	case 'user_list_movies': IsUserLoggedIn() ? require_once PROTECTED_DIR.'movies/user_list.php' : header('Location: index.php'); break;

	case 'add_movies': IsUserLoggedIn() ? require_once PROTECTED_DIR.'movies/add.php' : header('Location: index.php'); break;

	case 'trailers': IsUserLoggedIn() ? require_once PROTECTED_DIR.'movies/trailers.php' : header('Location: index.php'); break;

	case 'howto': IsUserLoggedIn() ? require_once PROTECTED_DIR.'movies/howto.php' : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
	
}

?>