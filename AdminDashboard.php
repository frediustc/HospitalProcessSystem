<?php include 'php/include/head.php';
$nbrs = $db->prepare('
SELECT
    (SELECT COUNT(*) FROM users WHERE usertype = 1) AS pat,
    (SELECT COUNT(*) FROM users WHERE usertype = 5) AS doc,
    (SELECT COUNT(*) FROM users WHERE usertype != 5 AND usertype != 6 AND usertype != 1) AS sta,
    (SELECT COUNT(*) FROM payment) AS pay,
    (SELECT COUNT(*) FROM consultation) AS con,
    (SELECT COUNT(*) FROM labexam) AS lab
');
$nbrs->execute();
$nbr = $nbrs->fetch();
?>
<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="fa fa-wheelchair"></i></div>
          <div class="name"><strong class="text-uppercase">Patients</strong><span>Total</span>
            <div class="count-number"><?php echo $nbr['pat'] ?></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-padnote"></i></div>
          <div class="name"><strong class="text-uppercase">Consultations</strong><span>Total</span>
            <div class="count-number"><?php echo $nbr['con'] ?></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-check"></i></div>
          <div class="name"><strong class="text-uppercase">Payment</strong><span>Total</span>
            <div class="count-number"><?php echo $nbr['pay'] ?></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="fa fa-heartbeat"></i></div>
          <div class="name"><strong class="text-uppercase">Lab</strong><span>Total</span>
            <div class="count-number"><?php echo $nbr['lab'] ?></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="fa fa-ambulance"></i></div>
          <div class="name"><strong class="text-uppercase">Staff</strong><span>Total</span>
            <div class="count-number"><?php echo $nbr['sta'] ?></div>
          </div>
        </div>
      </div>
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="fa fa-user-md"></i></div>
          <div class="name"><strong class="text-uppercase">Doctors</strong><span>Total</span>
            <div class="count-number"><?php echo $nbr['doc'] ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section class="statistics section-padding section-no-padding-bottom">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-8">
              <!-- Income-->
              <!-- <div class="card line-chart-example">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Payment progress</h2>
                </div>
                <div class="card-block">
                  <canvas id="lineChartExample"></canvas>
                </div>
              </div>
            </div>
        </div>
    </div>
</section> -->
<section class="statistics section-padding section-no-padding-bottom">
  <div class="container-fluid">
    <div class="row d-flex align-items-stretch justify-content-md-center">

      <div class="col-4">
        <!-- Income-->
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h2 class="h5 display display">Change password</h2>
          </div>
          <div class="card-block">
              <?php include 'php/script/pass.php'; ?>
            <form method="post" action="AdminDashboard.php">
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
      <div class="col-4">
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
