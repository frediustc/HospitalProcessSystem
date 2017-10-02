<?php include 'php/include/head.php'; ?>
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Analyse Queue List</h2>
                </div>
                <div class="card-block">
                  <table class="table table-striped table-sm">
                      <?php
                      $cons = $db->prepare('SELECT labexam.cid, users.fullname FROM labexam INNER JOIN consultation ON labexam.cid = consultation.id RIGHT OUTER JOIN users ON users.id = consultation.patientid WHERE labexam.status = "queue" ORDER BY labexam.id DESC');
                      $cons->execute();
                       ?>

                    <thead>
                      <tr>
                        <th>Patient</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($con = $cons->fetch()) { ?>
                            <tr>
                              <td><?php echo $con['fullname'] ?></td>
                              <td>
                                  <a href="result.php?id=<?php echo $con['cid']; ?>" class="btn btn-primary" title="give result"><span class="fa fa-external-link"></span></a>
                              </td>
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
