<?php
if(!isset($_GET['id'])){
    header('location: history.php');
}
if(empty($_GET['id']) || (int)$_GET['id'] <= 0){
    header('location: history.php');
}
include 'php/include/head.php';
?>
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Consultation History</h2>
                </div>
                <div class="card-block">
                  <table class="table table-striped table-sm">
                      <?php
                      $cons = $db->prepare('SELECT users.fullname, consultation.arrivaldate, consultation.id, consultation.assignto
                      FROM consultation
                      INNER JOIN users ON users.id = consultation.patientid
                      WHERE consultation.patientid = ?');
                      $cons->execute(array($_GET['id']));
                       ?>

                    <thead>
                      <tr>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Note</th>
                        <th>Lab</th>
                        <th>date</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($con = $cons->fetch()) {
                            $doc = $db->prepare('SELECT fullname FROM users WHERE id = ?');
                            $doc->execute(array($con['assignto']));
                            $d = $doc->fetch();

                            $not = $db->prepare('SELECT note FROM records WHERE cid = ? AND did = ?');
                            $not->execute(array($con['id'], $con['assignto']));
                            $n = $not->fetch();

                            $lab = $db->prepare('SELECT id, COUNT(id) AS c FROM labexam WHERE cid = ? AND status = "done"');
                            $lab->execute(array($con['id']));
                            $l = $lab->fetch();

                            $display = $l['c'] > 0 ? '<a href="ViewResult.php?id=' . $l['id'] . '" class="btn btn-primary" title="give result"><span class="fa fa-external-link"></span></a>': 'No';
                            ?>
                            <tr>
                              <td><?php echo $con['fullname'] ?></td>
                              <td><?php echo $d['fullname'] ?></td>
                              <td><?php echo $n['note'] ?></td>
                              <td><?php echo $display ?></td>
                              <td><?php echo $con['arrivaldate'] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>



<?php include 'php/include/footer.php'; ?>
