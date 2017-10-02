<?php include 'php/include/head.php'; ?>
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Patients List</h2>
                </div>
                <div class="card-block">
                  <table class="table table-striped table-sm">
                      <?php
                      $emps = $db->prepare('SELECT DISTINCT patientid FROM consultation WHERE assignto = ?');
                      $emps->execute(array($_SESSION['id']));
                      $i = 0;

                       ?>

                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Number</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>History</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($emp = $emps->fetch()) {
                            $pat = $db->prepare('SELECT * FROM users WHERE id = ?');
                            $pat->execute(array($emp['patientid']));
                            $p = $pat->fetch();
                            $bd = explode('-', $p['birthday']);
                            $c = array((int)strftime("%Y"), (int)strftime("%m"), (int)strftime("%d"));

                            $age = $c[0] - $bd[0];
                            $i++;

                            ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                              <td><?php echo $p['fullname'] ?></td>
                              <td>(+233) <?php echo $p['phone'] ?></td>
                              <td><?php echo $p['sex'] ?></td>
                              <td><?php echo $age ?> Yrs</td>
                              <td><a href="patientHistory.php?id=<?php echo $p['id']; ?>" class="btn btn-primary" title="give result"><span class="fa fa-external-link"></span></a></td>
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
