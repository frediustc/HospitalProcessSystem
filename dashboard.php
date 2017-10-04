<?php include 'php/include/head.php'; ?>
<section class="statistics section-padding section-no-padding-bottom">
  <div class="container-fluid">
    <div class="row d-flex align-items-stretch justify-content-md-center">
      <div class="col-lg-5 col-lg-offset-2">
        <!-- Income-->
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h2 class="h5 display display">Change password</h2>
          </div>
          <div class="card-block">
              <?php include 'php/script/pass.php'; ?>
            <form method="post" action="dashboard.php">
              <div class="form-group">
                <label>New password</label>
                <input type="password" placeholder="Enter your new password" name="ps" required class="form-control">
              </div>
              <div class="form-group">
                <label>Retype your password</label>
                <input type="password" placeholder="Same as password" name="cn" required class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" value="Change" name="update" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <!-- User Actibity-->
        <div class="wrapper user-activity">
          <h2 class="display h4">Personal Information</h2>
          <div class="page-visites mb-2"><span>Username</span></div>
          <h3 class="h4 display text-primary"><?php echo $_SESSION['un'] ?></h3>
          <div class="page-visites mb-2"><span>Fullname</span></div>
          <h3 class="h4 display text-primary"><?php echo $_SESSION['fn'] ?></h3>
          <div class="page-visites mb-2"><span>Sex</span></div>
          <h3 class="h4 display text-primary"><?php echo $_SESSION['gd'] ?></h3>
          <div class="page-visites mb-2"><span>Birthday</span></div>
          <h3 class="h4 display text-primary"><?php echo $_SESSION['bd'] ?></h3>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include 'php/include/footer.php'; ?>
