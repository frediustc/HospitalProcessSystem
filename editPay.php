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
                <h2 class="h5 display">Edit Pay</h2>
              </div>
              <div class="card-block">
                  <?php include 'php/script/updatePay.php';?>
                <form class="form-horizontal" method="post" action="EditPay.php?id=<?php echo $_GET['id'] ?>">
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
                      <button type="submit" class="btn btn-primary" name="editPay">Add</button>
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
