<?php
session_start();
// Constante pour définir la configuration de la DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'webforce3');

// définition DSN
$dsn = 'mysql:dbname='.DB_DATABASE.';host='.DB_HOST.';charset=UTF8';

// Instanciation de PDO
try {
	$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
}
catch (Exception $e) {
	echo $e->getMessage();
}


//charge les packages
require 'vendor/autoload.php';

use SocialLinks\Page;

//Create a Page instance with the url information
$page = new Page([
    'url' => 'http://mypage.com',
    'title' => 'Home - project toto',
    'text' => 'Extended page description',
    'image' => 'http://mypage.com/image.png',
    'twitterUser' => '@twitterUser'
]);
/*
echo '<a href="'.$page->facebook->shareUrl.'">Lien</a>';
echo '<a href="'.$page->linkedin->shareUrl.'">Lien</a>';
echo '<a href="'.$page->twitter->shareUrl.'">Lien</a>';
exit;
*/