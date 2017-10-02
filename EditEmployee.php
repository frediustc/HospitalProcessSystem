<?php
if(!isset($_GET['id'])){
    header('location: viewPay.php');
}
if(empty($_GET['id']) || (int)$_GET['id'] <= 0){
    header('location: viewPay.php');
}
include 'php/include/head.php';


?>
<section class="forms mt-5">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h2 class="h5 display">Edit Employee</h2>
              </div>
              <div class="card-block">
                  <?php include 'php/script/updatePatient.php';
                  $emps = $db->prepare('SELECT * FROM users WHERE id = ?');
                  $emps->execute(array($_GET['id']));
                  $p = $emps->fetch();
                  ?>
                <form class="form-horizontal" method="post" action="editEmployee.php?id=<?php echo $_GET['id'] ?>">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">FullName</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required min="5" max="100" name="fn" value="<?php echo $p['fullname'] ?>">
                      <span class="help-block-none">Texts and spaces between 5 and 100 Characters.</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Number</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">+233</span>
                            <input type="number" class="form-control" required min="9" name="nb" value="<?php echo $p['phone'] ?>">
                        </div>
                        <span class="help-block-none">Just the 9 remaining number</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-4 offset-sm-2">
                      <button type="reset" class="btn btn-secondary">Cancel</button>
                      <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
</section>



<?php include 'php/include/footer.php'; ?>
