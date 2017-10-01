<?php include 'php/include/head.php'; ?>
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Consultation List</h2>
                </div>
                <div class="card-block">
                  <table class="table table-striped table-sm">
                      <?php
                      $cons = $db->prepare('SELECT * FROM consultation WHERE assignto = ? AND status = "seen" ORDER BY status DESC');
                      $cons->execute(array($_SESSION['id']));
                       ?>

                    <thead>
                      <tr>
                        <th>Patient</th>
                        <th>Weig.</th>
                        <th>Pres.</th>
                        <th>Temp.</th>
                        <th>Symptom</th>
                        <th>Status</th>
                        <th>Nurse</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($con = $cons->fetch()) {
                            $pat = $db->prepare('SELECT fullname FROM users WHERE id = ?');
                            $pat->execute(array($con['patientid']));
                            $p = $pat->fetch();

                            $nurse = $db->prepare('SELECT fullname FROM users WHERE id = ?');
                            $nurse->execute(array($con['nurseid']));
                            $d = $nurse->fetch();
                            ?>
                            <tr>
                              <td><?php echo $p['fullname'] ?></td>
                              <td><?php echo $con['weight'] ?></td>
                              <td><?php echo $con['pressure'] ?></td>
                              <td><?php echo $con['temperature'] ?></td>
                              <td><?php echo $con['symptom'] ?></td>
                              <td><?php echo $con['status'] ?></td>
                              <td><?php echo $d['fullname'] ?></td>
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
