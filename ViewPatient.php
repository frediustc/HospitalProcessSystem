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
                      $emps = $db->prepare('SELECT * FROM users WHERE usertype = 1 ORDER BY fullname');
                      $emps->execute();
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
                        <?php if ($_SESSION['r'] == 'Nurse' || $_SESSION['r'] == 'Admin'): ?>
                            <th>Option</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($emp = $emps->fetch()) {
                            $bd = explode('-', $emp['birthday']);
                            $c = array((int)strftime("%Y"), (int)strftime("%m"), (int)strftime("%d"));

                            $age = $c[0] - $bd[0];
                            $i++;
                            ?>
                            <tr>
                              <th scope="row"><?php echo $i; ?></th>
                              <td><?php echo $emp['fullname'] ?></td>
                              <td>(+233) <?php echo $emp['phone'] ?></td>
                              <td><?php echo $emp['sex'] ?></td>
                              <td><?php echo $age ?> Yrs</td>
                              <td><a href="patientHistory.php?id=<?php echo $emp['id']; ?>" class="btn btn-primary" title="give result"><span class="fa fa-external-link"></span></a></td>
                              <?php if ($_SESSION['r'] == 'Nurse' || $_SESSION['r'] == 'Admin'): ?>
                                  <td>
                                      <a href="editPatient.php?id=<?php echo $emp['id']; ?>" class="btn btn-primary" title="edit"><span class="fa fa-pencil"></span></a>
                                  </td>
                              <?php endif; ?>
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
