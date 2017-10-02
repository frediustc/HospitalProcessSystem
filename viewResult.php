<?php
if(!isset($_GET['id'])){
    header('location: history.php');
}
if(empty($_GET['id']) || (int)$_GET['id'] <= 0){
    header('location: history.php');
}
include 'php/include/head.php';
?>
<section class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">View Result</h2>
                </div>
                <div class="card-block">
                  <table class="table table-striped table-sm">
                      <?php
                      $cons = $db->prepare('SELECT * FROM labexam WHERE id = ?');
                      $cons->execute(array($_GET['id']));
                       ?>

                    <thead>
                      <tr>
                        <th>WBC_COUNT</th>
                        <th>RBC_COUNT</th>
                        <th>HEMOGLOBIN</th>
                        <th>HEMATOCRIT</th>
                        <th>MCV</th>
                        <th>MCH</th>
                        <th>MCHC</th>
                        <th>RDW_CV</th>
                        <th>PLATELET_COUNT</th>
                        <th>MPV</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($con = $cons->fetch()) { ?>
                            <tr>
                              <td><?php echo $con['WBC_COUNT'] ?>K\UL <small title="standard">(4.5 - 11)</small></td>
                              <td><?php echo $con['RBC_COUNT'] ?>MIL\UL <small title="standard">(3.5 - 5.5)</small></td>
                              <td><?php echo $con['HEMOGLOBIN'] ?>G\DL <small title="standard">(12 - 15)</small></td>
                              <td><?php echo $con['HEMATOCRIT'] ?>% <small title="standard">(36 - 48)</small></td>
                              <td><?php echo $con['MCV'] ?>FL <small title="standard">(79 - 101)</small></td>
                              <td><?php echo $con['MCH'] ?>PG <small title="standard">(25 - 35)</small></td>
                              <td><?php echo $con['MCHC'] ?>% <small title="standard">(31 - 37)</small></td>
                              <td><?php echo $con['RDW_CV'] ?>FL <small title="standard">(11 - 16)</small></td>
                              <td><?php echo $con['PLATELET_COUNT'] ?>K\UL <small title="standard">(150 - 420)</small></td>
                              <td><?php echo $con['MPV'] ?>FL <small title="standard">(7 - 10)</small></td>
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
