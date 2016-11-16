<html>
	<head>
		<title>Projet</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
		<!-- my themes -->
		<link rel="stylesheet" href="boostrap/css/bootstrap.min.css">

		<!-- Optional theme 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">-->
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-0"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="page-header">
			  			<h1>Entrez votre email</h1>
			  			<h3>Nous vous enverrons un mail de modification</h3>
					</div>
					<form action="" method="post">
						<fieldset>
							<input type="email" class="form-control" name="emailLoginToto" value="" placeholder="Email address" /><br />
							<input type="submit" class="btn btn-success btn-block" value="Envoyer" />
						</fieldset>
					</form>
				</div>
			<div class="col-md-2 col-sm-2 col-xs-0"></div>
		</div>
	</div>

<?php require 'views/footer.php';?>