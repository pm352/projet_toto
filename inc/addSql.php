<?php

$etudiantListe = array();
$citiesList = array(
	1 => 'Esch-sur-Alzette',
	2 => 'Verdun',
	3 => 'Luxembourg',
	4 => 'Metz',
	5 => 'Differdange',
	6 => 'Rosport',
	7 => 'Bascharage',
	8 => 'Clervaux',
	10 => 'Strasbourg',
	11 => 'Nancy',
	18 => 'Thionville',
);
$countriesList = array(
	1 => 'Luxembourg',
	2 => 'France',
	3 => 'Belgique',
	4 => 'Chine',
	5 => 'Bangladesch',
	7 => 'Chine',
);
$friendlinessList = array(
	1 => 'Pas sympa',
	2 => 'Assez sympa',
	3 => 'Sympa',
	4 => 'Très sympa',
	5 => 'Génial',
);


// définition DSN
require_once 'inc/config.php';


$sql='SELECT stu_id, stu_lname, stu_fname, stu_email, cou_name, cit_name, stu_friendliness, YEAR(NOW())-stu_age AS birthdate
	 FROM student
	 LEFT OUTER JOIN country ON country.cou_id = student.city_cit_id
	 LEFT OUTER JOIN city ON city.cit_id = student.city_cit_id';

//j'exécute ma requete SELECT
$pdoStatement = $pdo->query($sql);
//si erreur
if ($pdoStatement === false){
	print_r($pdo->errorInfo());
}
//sinon, je récupère les données
else{
	//je récupère toutes les données
	$studentListe = $pdoStatement->fetchAll();

	//print_r($studentListe);
}


//formulaire
// J'initialise mes variables
$formOk = true;
$nom = '';
$prenom = '';
$email = '';
$birthdate = '';

// Formulaire soumis
if (!empty($_POST)) {
	// Je debug les données
	print_r($_POST);
	// Je récupère les données et je les traite (trim())
	$nom = isset($_POST['studentName']) ? htmlspecialchars(strtoupper(trim($_POST['studentName']))) : '';
	$prenom = isset($_POST['studentFirstname']) ? htmlspecialchars(trim($_POST['studentFirstname'])) : '';
	$email = isset($_POST['studentEmail']) ? trim($_POST['studentEmail']) : '';
	$birthdate = isset($_POST['studentBirhtdate'])? htmlspecialchars(trim($_POST['studentBirhtdate'])) : '';
	$ville= isset($_POST['cit_id']) && is_numeric($_POST['cit_id']) ? intval($_POST['cit_id']) : 0;
	$sympa= isset($_POST['stu_friendliness']) && is_numeric($_POST['stu_friendliness']) ? intval($_POST['stu_friendliness']) : 0;


	// Validation des données
	if (empty($nom)) {
		echo 'Le nom est vide<br>';
		$formOk = false;
	}
	// Je valide le nom
	else if (strlen($nom) < 2) {
		echo 'Le nom est incorrect (2 caractères minimum)<br>';
		$formOk = false;
	}
	if (empty($prenom)) {
		echo 'Le prénom est vide<br>';
		$formOk = false;
	}
	// Je valide le prénom
	else if (strlen($prenom) < 2) {
		echo 'Le prénom est incorrect (2 caractères minimum)<br>';
		$formOk = false;
	}
	if (empty($email)) {
		echo 'L\'adresse email est vide<br>';
		$formOk = false;
	}
	// Je valide l'email
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo 'L\'adresse email est incorrecte<br>';
		$formOk = false;
	}
	// Je valide l'annee de naissance
	if (empty($birthdate)) {
		echo 'La date est vide<br>';
		$formOk = false;
	}
	else if (strlen($birthdate) < 4) {
		echo 'La date est incorrect (4 caractères minimum)<br>';
		$formOk = false;
	}
	if ($ville == 0) {
		echo 'Veuillez renseigner une ville<br>';
		$formOk = false;
	}
	if ($sympa == 0) {
		echo 'Veuillez renseigner un niveau de sympathie<br>';
		$formOk = false;
	}

	//upload de la photo
		//print_r($_POST);
		//print_r($_FILES);
	
	//Si des fichiers ont été téléversés
	if (sizeof($_FILES)>0) {
		//Je récupère les données du fichier 'fileForm'
		$fileUpload= $_FILES['fileForm'];
		$extension = substr($fileUpload['name'], -4);

		if ($extension != '.php' && ($extension =='.jpg' || $extension =='.gif' || $extension =='.svg' || $extension =='.png')) {
			$extension = substr($fileUpload['name'], -5);
			if ($extension ='.jpeg') {
				//je téléverse le fichier
			if (move_uploaded_file($fileUpload['tmp_name'], 'files/'. $fileUpload['name'] )) {
				echo 'fichier téléversé<br>';
			}
			
			}else{
				echo 'Erreur dans le téléversement<br>';
			}
		}
		else{
			echo'petit malin';
		}							
	}

	if ($formOk) {
		echo 'formulaire ok<br>';		

		$sql="INSERT INTO student (stu_lname, stu_fname, stu_email, stu_friendliness, city_cit_id, training_tra_id, stu_age)
		VALUES (:stuLname, :stuFname, :stuEmail, :stuFriendliness, :cityCitId,:stuTraining, :stuAge)
		";

		$dateY= substr($birthdate, 0,4);
		$age= 2016-$dateY;

		$pdoStatement = $pdo->prepare($sql);
		// Requete pas encore exécutée
		// Je remplace les paramètres par leurs valeurs
		$pdoStatement->bindValue(':stuLname', $nom);
		$pdoStatement->bindValue(':stuFname', $prenom);
		$pdoStatement->bindValue(':stuEmail', $email);
		$pdoStatement->bindValue(':stuFriendliness', $sympa, PDO::PARAM_INT);
		$pdoStatement->bindValue(':cityCitId', $ville, PDO::PARAM_INT);
		$pdoStatement->bindValue(':stuTraining', 3, PDO::PARAM_INT);
		$pdoStatement->bindValue(':stuAge', $age, PDO::PARAM_INT);

		// J'exécute
		if (!$pdoStatement->execute()) {
			print_r($pdoStatement->errorInfo());
		}
		else {
			if ($pdoStatement->rowCount()>0){
				$relist=$pdoStatement->fetch();
				print_r($relist);
			}
		header('Location: add.php');
		}
	}

}