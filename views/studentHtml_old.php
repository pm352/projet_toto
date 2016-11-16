<div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">Esch-Belval</div>
  <div class="panel-body">
    <h4>Information conçernant le student de la formation webforce3</h4>  
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Session</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Age</th>
        <th>City</th>
        <th>Sympathy</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($studentListe as $studiantAll) : ?>
      <tr>
        <td><?= $studiantAll['training_tra_id'] ?></td>
        <td><?= $studiantAll['stu_lname'] ?></td>
        <td><?= $studiantAll['stu_fname'] ?></td>
        <td><?= $studiantAll['stu_email'] ?></td>
        <td><?= $studiantAll['stu_age'] ?></td>
        <td><?= $studiantAll['cit_name'] ?></td>
        <td><?= $studiantAll['stu_friendliness'] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <nav aria-label="">
    <ul class="pager">
      <li><a href="list.php?">Back</a></li>
      <li><a href="update.php?stu=<?= $studiantAll['stu_id']?>">Modifier student</a></li>
    </ul>
  </nav>
</div>