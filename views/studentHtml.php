<div class="panel panel-primary">
<!-- Default panel contents -->
  <div class="panel-heading">Esch-Belval</div>
  <div class="panel-body">
    <h4>Information conçernant le student de la formation webforce3</h4>  
  </div>
  <div id="studentContent">
  <script type ="text/javascript" >
  $(function() {
    console.log('ok');
    jQuery.ajax({
      url : 'ajax/studentAjax.php',
      type : 'post',
      data : "studentId= "<?php $stuId; ?>
    }).done(function(data) {
        $('#studentContent').html(data);
        console.log(data);
    });



  });//jq

  </script>
    </div>
  <nav aria-label="">
    <ul class="pager">
      <li><a href="list.php?">Back</a></li>
      <li><a href="update.php?stu=<?= $studiantAll['stu_id']?>">Modifier student</a></li>
    </ul>
  </nav>
</div>

