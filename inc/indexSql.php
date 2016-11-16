<?php
require_once 'inc/config.php';

//requete recup sessions
$sql='
	SELECT tra_id , tra_start_date, tra_end_date, loc_name, count(*) as nombre
	FROM training
	LEFT OUTER JOIN location ON location.loc_id = training.location_loc_id
	LEFT OUTER JOIN student ON student.training_tra_id = training.tra_id
	GROUP BY tra_id , tra_start_date, tra_end_date, loc_name
	ORDER BY tra_start_date
';
//j'exécute ma requete SELECT
$pdoStatement = $pdo->query($sql);
//si erreur
if ($pdoStatement === false){
	print_r($pdo->errorInfo());
}
//sinon, je récupère les données
else{
	//je récupère toutes les données
	$sessionList = $pdoStatement->fetchAll();

	//print_r($sessionList);
}


?>
