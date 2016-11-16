<form enctype="multipart/form-data" action="" method="post">
	<div class="form-group">
		<div class="panel panel-primary">
		<!-- Default panel contents -->
		  <div class="panel-heading">Esch-Belval</div>
		  <div class="panel-body">
		  </div>
			<fieldset>
				<legend>Ajout d'un student à la formation webforce3</legend>
				<input type="text" name="studentName" value="" placeholder="Nom" class="form-control for"><br />
				<input type="text" name="studentFirstname" value="" placeholder="Prénom" class="form-control for"><br />
				<input type="email" name="studentEmail" value="" placeholder="E-mail" class="form-control for"><br />
				<input type="date" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)" class="form-control for"><br />
				Ville de résidence :<br />
				<select name="cit_id" class="form-control for">
					<option value="0">choisissez :</option>
					<?php foreach ($citiesList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
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
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
			

				<input type="hidden" name="submitFile" value="1" />
					<label for="fileForm">Uploader votre photo</label>
					<input type="file" name="fileForm" id="fileForm" />
					<p class="help-block">Extensions autorisées ( jpg, jpeg, gif, svg, png )</p>
					<br />
					<input type="submit" class="btn btn-success btn-block" value="Envoyer" />
			</fieldset>
		</div>
	</div>
</form>