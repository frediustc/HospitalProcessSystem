<?php include 'php/include/head.php'; ?>
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Employees List</h2>
                </div>
                <div class="card-block">
                  <table class="table table-striped table-sm">
                      <?php
                      $emps = $db->prepare('SELECT * FROM users WHERE usertype != 6 AND usertype != 1');
                      $emps->execute();
                       ?>

                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Number</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Role</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($emp = $emps->fetch()) {
                            $bd = explode('-', $emp['birthday']);
                            $c = array((int)strftime("%Y"), (int)strftime("%m"), (int)strftime("%d"));

                            $age = $c[0] - $bd[0];

                            $roles = $db->prepare('SELECT * FROM usertype WHERE id = ?');
                            $roles->execute(array($emp['usertype']));
                            $role = $roles->fetch();
                            ?>
                            <tr>
                              <th scope="row"><?php echo $emp['username']; ?></th>
                              <td><?php echo $emp['fullname'] ?></td>
                              <td>(+233) <?php echo $emp['phone'] ?></td>
                              <td><?php echo $emp['sex'] ?></td>
                              <td><?php echo $age ?> Yrs</td>
                              <td><?php echo $role['type'] ?></td>
                              <td>
                                  <a href="delete.php?id=<?php echo $emp['id']; ?>" class="btn btn-danger" title="delete"><span class="fa fa-trash"></span></a>
                                  <a href="editEmployee.php?id=<?php echo $emp['id']; ?>" class="btn btn-primary" title="edit"><span class="fa fa-pencil"></span></a>
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
