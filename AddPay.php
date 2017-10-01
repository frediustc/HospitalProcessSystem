<?php include 'php/include/head.php'; ?>
<section class="forms mt-5">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h2 class="h5 display">Make Pay</h2>
              </div>
              <div class="card-block">
                  <?php include 'php/script/makePay.php';?>
                <form class="form-horizontal" method="post" action="AddPay.php">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Patient</label>
                      <div class="col-sm-10 select">
                        <select name="pid" class="form-control" required>
                            <?php
                            $users = $db->prepare('
                            SELECT users.id, users.fullname
                            FROM consultation
                            INNER JOIN users ON consultation.patientid = users.id
                            WHERE status = "pending" ORDER BY fullname');
                            $users->execute();
                            while ($u = $users->fetch()) { ?>
                                <option value="<?php echo $u['id'] ?>"><?php echo $u['fullname'] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Paid</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">Ghc</span>
                            <input type="text" class="form-control" required name="pay" <?php if ($change): ?> value="<?php echo $_POST['pai']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-4 offset-sm-2">
                      <button type="reset" class="btn btn-secondary">Cancel</button>
                      <button type="submit" class="btn btn-primary" name="addPay">Add</button>
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
