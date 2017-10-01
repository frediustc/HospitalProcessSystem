<?php include 'php/include/head.php'; ?>
<section class="forms mt-5">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h2 class="h5 display">Add Consultation</h2>
              </div>
              <div class="card-block">
                  <?php include 'php/script/createConsultation.php';?>
                <form class="form-horizontal" method="post" action="AddConsultation.php">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Patient</label>
                      <div class="col-sm-10 select">
                        <select name="pid" class="form-control" required>
                            <?php
                            $users = $db->prepare('SELECT id, fullname FROM users WHERE usertype = 1 ORDER BY fullname');
                            $users->execute();
                            while ($u = $users->fetch()) { ?>
                                <option value="<?php echo $u['id'] ?>"><?php echo $u['fullname'] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Weight</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">Kg</span>
                            <input type="text" class="form-control" required name="wei" <?php if ($change): ?> value="<?php echo $_POST['wei']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Pressure</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">MAP</span>
                            <input type="text" class="form-control" required name="pres" <?php if ($change): ?> value="<?php echo $_POST['pres']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Temperature</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">Celcus</span>
                            <input type="text" class="form-control" required name="tem" <?php if ($change): ?> value="<?php echo $_POST['tem']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 37.5</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Symptom</label>
                    <div class="col-sm-10">
                        <textarea name="sym" class="form-control" required><?php if($change) { echo $_POST['sym']; } ?></textarea>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Assign to Doctor</label>
                    <div class="col-sm-10 select">
                      <select name="did" class="form-control" required>
                          <?php
                          $docs = $db->prepare('SELECT id, fullname FROM users WHERE usertype = 5 ORDER BY fullname');
                          $docs->execute();
                          while ($d = $docs->fetch()) { ?>
                              <option value="<?php echo $d['id'] ?>"><?php echo $d['fullname'] ?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-4 offset-sm-2">
                      <button type="reset" class="btn btn-secondary">Cancel</button>
                      <button type="submit" class="btn btn-primary" name="addConsultation">Add</button>
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
