<?php include 'php/include/head.php'; ?>
<section class="forms mt-5">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h2 class="h5 display">Add Patient</h2>
              </div>
              <div class="card-block">
                  <?php include 'php/script/insertUser.php';?>
                <form class="form-horizontal" method="post" action="AddPatient.php">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">FullName</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required min="5" max="100" name="fn" <?php if ($change): ?> value="<?php echo $_POST['fn']; ?>" <?php endif; ?>>
                      <span class="help-block-none">Texts and spaces between 5 and 100 Characters.</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Number</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">+233</span>
                            <input type="number" class="form-control" required min="9" name="nb" <?php if ($change): ?> value="<?php echo $_POST['nb']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Just the 9 remaining number</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Sex</label>
                    <div class="col-sm-10">
                      <div class="i-checks">
                        <input id="radioCustom1" type="radio" value="Male" checked name="sex" class="form-control-custom radio-custom">
                        <label for="radioCustom1">Male</label>
                      </div>
                      <div class="i-checks">
                        <input id="radioCustom2" type="radio" value="Female" name="sex" class="form-control-custom radio-custom">
                        <label for="radioCustom2">Femaule</label>
                      </div>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Birthday</label>
                    <div id="birthdayPicker" class="col-sm-10"></div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-4 offset-sm-2">
                      <button type="reset" class="btn btn-secondary">Cancel</button>
                      <button type="submit" class="btn btn-primary" name="addPatient">Add</button>
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
