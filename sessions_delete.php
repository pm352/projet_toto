<pre><?php
// A mettre au début du début du début du début du début du début du début du début du début du début du début du début du début du début du début du début du fichier
session_start();

// Je supprime une variable en session
unset($_SESSION['userId']);

if (isset($_GET['all'])) {
	session_unset();
}


header('Location: index.php');
?></pre>