<form action="" method="post">
	<div class="form-group">
		<div class="panel panel-primary">
		<!-- Default panel contents -->
		  <div class="panel-heading">Esch-Belval</div>
		  <div class="panel-body">
		  </div>
			<fieldset>
			<?php foreach ($studentListe as $studiantAll) : ?>
				<legend>Modification d'un student webforce3</legend>
				<input type="text" name="studentName" value="<?= $studiantAll['stu_lname'] ?>" placeholder="Nom" class="form-control for"><br />
				<input type="text" name="studentFirstname" value="<?= $studiantAll['stu_fname'] ?>" placeholder="Prénom" class="form-control for"><br />
				<input type="email" name="studentEmail" value="<?= $studiantAll['stu_email'] ?>" placeholder="E-mail" class="form-control for"><br />
				<input type="date" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)" class="form-control for"><br />
				Ville de résidence :<br />
				<select name="cit_id" class="form-control for">
					<option value="0">choisissez :</option>
					<?php foreach ($citiesList as $key=>$value) :?>
					<option value="<?= $key ?>"
					<?php if ( $studiantAll['cit_id']==$key){
						echo' selected="selected"';
						} ?>						
					><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
				Nationalité :<br />
				<select name="cou_id" class="form-control for">
					<option value="0">choisissez :</option>
					<?php foreach ($countriesList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
				Sympathie :<br />
				<select name="stu_friendliness" class="form-control for">
					<option value="">choisissez :</option>
					<?php foreach ($friendlinessList as $key=>$value) :?>
					<option value="<?= $key ?>"
					<?php if ( $studiantAll['stu_friendliness']==$key){
							echo' selected="selected"';
							} ?>
						><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
				<input type="submit" value="Valider" class="btn btn-default"><br />
			<?php endforeach; ?>
			</fieldset>
		</div>
	</div>
</form>