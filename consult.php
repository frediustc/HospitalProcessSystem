<?php
if(!isset($_GET['id'])){
    header('location: ViewMyConsultationQueue.php');
}
if(empty($_GET['id']) || (int)$_GET['id'] <= 0){
    header('location: ViewMyConsultationQueue.php');
}
include 'php/include/head.php';
?>
<section class="mt-5">
    <div class="container-fluid">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Record</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">History Patient</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel">
              <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h2 class="h5 display">Information about the consultation</h2>
                      </div>
                      <div class="card-block">
                          <?php include 'php/script/consults.php';?>
                        <form class="form-horizontal" method="post" action="consult.php?id=<?php echo $_GET['id'] ?>">
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Send to the Lab</label>
                              <div class="col-sm-10">
                                <div class="i-checks">
                                  <input id="labChck" type="checkbox" name="lab" value="yes" class="form-control-custom">
                                  <label for="labChck">Check if the patient need to go to the lab</label>
                                </div>
                              </div>
                            </div>
                            <div class="line"></div>
                          <div class="form-group row" id="noteBox">
                            <label class="col-sm-2 form-control-label">Note</label>
                            <div class="col-sm-10">
                                <textarea name="note" class="form-control" ><?php if($change) { echo $_POST['note']; } ?></textarea>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <div class="col-sm-4 offset-sm-2">
                              <button type="reset" class="btn btn-secondary">Cancel</button>
                              <button type="submit" class="btn btn-primary" name="finish">finish</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="tab-pane" id="profile" role="tabpanel">
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
                            WHERE consultation.id = ?');
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
        </div>

    </div>
</section>



<?php include 'php/include/footer.php'; ?>
