<?php
if(!isset($_GET['id'])){
    header('location: analyse.php');
}
if(empty($_GET['id']) || (int)$_GET['id'] <= 0){
    header('location: analyse.php');
}
include 'php/include/head.php';
?>
<section class="forms mt-5">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h2 class="h5 display">Enter Result</h2>
              </div>
              <div class="card-block">
                  <?php include 'php/script/results.php';?>
                <form class="form-horizontal" method="post" action="result.php?id=<?php echo $_GET['id'] ?>">
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">WBC_COUNT</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">K\UL</span>
                            <input type="text" class="form-control" required name="WBC_COUNT" <?php if ($change): ?> value="<?php echo $_POST['WBC_COUNT']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">RBC_COUNT</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">MIL\UL</span>
                            <input type="text" class="form-control" required name="RBC_COUNT" <?php if ($change): ?> value="<?php echo $_POST['RBC_COUNT']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">HEMOGLOBIN</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">G\DL</span>
                            <input type="text" class="form-control" required name="HEMOGLOBIN" <?php if ($change): ?> value="<?php echo $_POST['HEMOGLOBIN']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">HEMATOCRIT</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">%</span>
                            <input type="text" class="form-control" required name="HEMATOCRIT" <?php if ($change): ?> value="<?php echo $_POST['HEMATOCRIT']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">MCV</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">FL</span>
                            <input type="text" class="form-control" required name="MCV" <?php if ($change): ?> value="<?php echo $_POST['MCV']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">MCH</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">PG</span>
                            <input type="text" class="form-control" required name="MCH" <?php if ($change): ?> value="<?php echo $_POST['MCH']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">MCHC</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">%</span>
                            <input type="text" class="form-control" required name="MCHC" <?php if ($change): ?> value="<?php echo $_POST['MCHC']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 120.03</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">RDW_CV</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">FL</span>
                            <input type="text" class="form-control" required name="RDW_CV" <?php if ($change): ?> value="<?php echo $_POST['RDW_CV']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 37.5</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">PLATELET_COUNT</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">K\UL</span>
                            <input type="text" class="form-control" required name="PLATELET_COUNT" <?php if ($change): ?> value="<?php echo $_POST['PLATELET_COUNT']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 37.5</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">MPV</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">FL</span>
                            <input type="text" class="form-control" required name="MPV" <?php if ($change): ?> value="<?php echo $_POST['MPV']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 37.5</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Pay</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">Ghc</span>
                            <input type="text" class="form-control" required name="pay" <?php if ($change): ?> value="<?php echo $_POST['pay']; ?>" <?php endif; ?>>
                        </div>
                        <span class="help-block-none">Allow format 37.5</span>
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="form-group row">
                    <div class="col-sm-4 offset-sm-2">
                      <button type="reset" class="btn btn-secondary">Cancel</button>
                      <button type="submit" class="btn btn-primary" name="sendResult">Send</button>
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
