

<div class="jumbotron">
	  <h1>Welcome to my World!</h1>
	  <p> Tou aimes Bootstrap ?</p>
	  <p><a class="btn btn-primary btn-lg" href="https://www.youtube.com/watch?v=hJgQCbRsq-I" target="_blank" role="button">Learn more</a></p>
</div>

<div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">Esch-Belval</div>
  <div class="panel-body">
    <h4>Liste des sessions de formation webforce3 par date pour Esch</h4> 
  </div>
<!-- Table -->
<table class="table">
  <thead>
    <tr>
      <th>Sessions</th>
      <th>Date début</th>
      <th>Date fin</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($sessionList as $sessionDate) : ?>
    <tr>
      <td><a href="list.php?id=<?= $sessionDate['tra_id'] ?>">Session <?= $sessionDate['tra_id'] ?></a></td>
      <td><?= $sessionDate['tra_start_date'] ?></td>
      <td><?= $sessionDate['tra_end_date'] ?></a></td>
      <td><a href="list.php?id=<?= $sessionDate['tra_id'] ?>"><?= $sessionDate['nombre'] ?></a></td>
    </tr>
  <?php endforeach; ?>

  </tbody>
</table>
</div>