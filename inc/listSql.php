<?php
require_once 'inc/config.php';

$sql='SELECT stu_id, stu_lname, stu_fname, stu_email, stu_age, cou_name, cit_name, stu_friendliness, training_tra_id
	 FROM student
	 LEFT OUTER JOIN country ON country.cou_id = student.city_cit_id
	 LEFT OUTER JOIN city ON city.cit_id = student.city_cit_id
	 INNER JOIN training ON training.tra_id= student.training_tra_id
	 ';

//barre de recherche - Mettre q= dans l'url, page html dans le champ form
//ne pas oublier de faire un bindvalue :search = '%'.$search.'%'
$search="";
$search=isset($_GET['q']) ? trim($_GET['q']):'';
if (!empty($search)) {
	$sql.= "WHERE stu_lname LIKE :search
			OR 	  stu_fname LIKE :search
			OR 	  stu_email LIKE :search
			OR 	  stu_age LIKE :search
			OR 	  cit_name LIKE :search";
}
//Mettre id= dans l'url, page html, pour choisir les students par session
$sessinIdUrl =0;
$sessinIdUrl = isset($_GET['id']) ? intval($_GET['id']): 0;
//echo $sessinIdUrl;
if (!empty($sessinIdUrl)) {
	$sql.= "WHERE tra_id = $sessinIdUrl";
}

//Mettre stu= dans l'url, page html, pour choisir le student seul
$stuId=0;
$stuId= isset($_GET['stu']) ? intval($_GET['stu']) : 0;
//echo $stuId;
if (!empty($stuId)) {
	$sql.= "WHERE stu_id = :id ";
}

//pagination - Ajouter page= dans l'url, page html, pour voir les autres pages
$page=0;
$page= isset($_GET['page']) ? intval($_GET['page']) : 1;
//echo $page;
if (!empty($page) && $page<=0) {
	$page=1;
}

//pagination pour voir les autres pages et l'offset pour avoir le nb de student par page 
$nbStuAff=0;
$nbStuAff= isset($_GET['nbStuAff']) ? intval($_GET['nbStuAff']) : 8;
//echo $nbStuAff;
if (!empty($nbStuAff)) {
	$offset = ($page-1) * $nbStuAff;
	$sql.= " LIMIT $offset, $nbStuAff";	
}

//Exécution de ma requete SELECT
$pdoStatement = $pdo->prepare($sql);

$pdoStatement->bindValue(':id', $stuId, PDO::PARAM_INT);

//bindvalue pour la barre de recherche
if (!empty($search)) {
$pdoStatement->bindValue(':search', '%'.$search.'%', PDO::PARAM_INT);
}

//si erreur
if ($pdoStatement->execute() === false){
	print_r($pdo->errorInfo());
}
//sinon, je récupère les données
else{
	//je récupère toutes les données
	$studentListe = $pdoStatement->fetchAll();
	//print_r($studentListe);
}
?>