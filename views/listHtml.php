<div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">Esch-Belval</div>
  <div class="panel-body">
    <h4>Liste des students de la formation webforce3</h4>
    <form action="" id="selectAff" method="GET">
	    <select name="nbStuAff" class="form-control for">
			<option selected="selected" value="0">choisissez le nombre de student à afficher</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br>
		<input id="sub" type="submit" value="Valider" class="btn btn-default">
	</form>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Session</th>
      <!--  <th>Age</th>
        <th>City</th>
        <th>Sympathy</th>-->
      </tr>
    </thead>
    <tbody>
    <?php foreach ($studentListe as $studiantAll) : ?>
      <tr>
        <td><a href="student.php?stu=<?= $studiantAll['stu_id']?>"><?= $studiantAll['stu_lname'] ?></td>
        <td><?= $studiantAll['stu_fname'] ?></td>
        <!--<td><?= $studiantAll['stu_email'] ?></td>
        <td><?= $studiantAll['stu_age'] ?></td>-->
        <td><?= $studiantAll['cit_name'] ?></td>
        <!--<td><?= $studiantAll['stu_friendliness'] ?></td>-->
        <td><?= $studiantAll['training_tra_id'] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <nav aria-label="">
    <ul class="pager">
      <?php if ($page>1) : ?>
      	<li><a href="list.php?nbStuAff=<?= $nbStuAff?>&page=<?php echo $page-1?>">Previous</a></li>
      <?php endif; ?>
      <?php if (count($studentListe)!=0) : ?>
      <li><a href="list.php?nbStuAff=<?= $nbStuAff?>&page=<?php echo $page+1?>">Next</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</div>