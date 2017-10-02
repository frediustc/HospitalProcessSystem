<?php
    $change = false;
    if(isset($_POST['sendResult'])){
        $ok = true;

        $WBC_COUNT = htmlspecialchars(trim($_POST['WBC_COUNT']));
        $RBC_COUNT = htmlspecialchars(trim($_POST['RBC_COUNT']));
        $HEMOGLOBIN = htmlspecialchars(trim($_POST['HEMOGLOBIN']));
        $HEMATOCRIT = htmlspecialchars(trim($_POST['HEMATOCRIT']));
        $MCV = htmlspecialchars(trim($_POST['MCV']));
        $MCH = htmlspecialchars(trim($_POST['MCH']));
        $MCHC = htmlspecialchars(trim($_POST['MCHC']));
        $RDW_CV = htmlspecialchars(trim($_POST['RDW_CV']));
        $PLATELET_COUNT = htmlspecialchars(trim($_POST['PLATELET_COUNT']));
        $MPV = htmlspecialchars(trim($_POST['MPV']));
        $pay = htmlspecialchars(trim($_POST['pay']));

        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $pay)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Pay!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $WBC_COUNT)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>WBC_COUNT!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $RBC_COUNT)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>RBC_COUNT!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $HEMOGLOBIN)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$HEMOGLOBIN!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $HEMATOCRIT)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$HEMATOCRIT!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $MCV)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$MCV!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $MCH)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$MCH!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $MCHC)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$MCHC!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $RDW_CV)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$RDW_CV!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $PLATELET_COUNT)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$PLATELET_COUNT!</strong> Wrong Format.
            </div>
            ';
        }
        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $MPV)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>$MPV!</strong> Wrong Format.
            </div>
            ';
        }

        if($ok){
            $stdadd = $db->prepare('UPDATE labexam SET
                WBC_COUNT = ?,
                RBC_COUNT = ?,
                HEMOGLOBIN = ?,
                HEMATOCRIT = ?,
                MCV = ?,
                MCH = ?,
                MCHC = ?,
                RDW_CV = ?,
                PLATELET_COUNT = ?,
                MPV = ?,
                madedate = NOW(),
                pay = ?,
                status = "done"
                WHERE cid = ?
                ');
            if($stdadd->execute(array(
                $WBC_COUNT,
                $RBC_COUNT,
                $HEMOGLOBIN,
                $HEMATOCRIT,
                $MCV,
                $MCH,
                $MCHC,
                $RDW_CV,
                $PLATELET_COUNT,
                $MPV,
                $pay,
                $_GET['id'])
            )){

                echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>Sucess!</strong> Results Sent.
                </div>';
            }
            else {
                echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
            }
        }
        else {
            $change = true;
        }
    }
?>
