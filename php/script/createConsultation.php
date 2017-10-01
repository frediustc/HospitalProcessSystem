<?php
    $change = false;
    if(isset($_POST['addConsultation'])){
        $ok = true;

        $pid = htmlspecialchars(trim($_POST['pid']));
        $did = htmlspecialchars(trim($_POST['did']));
        $wei = htmlspecialchars(trim($_POST['wei']));
        $tem = htmlspecialchars(trim($_POST['tem']));
        $pres = htmlspecialchars(trim($_POST['pres']));
        $sym = htmlspecialchars(trim($_POST['sym']));

        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $wei)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Weight!</strong> Wrong Format.
            </div>
            ';
        }

        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $tem)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Temperature!</strong> Wrong Format.
            </div>
            ';
        }

        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $pres)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Temperature!</strong> Wrong Format.
            </div>
            ';
        }

        if(strlen($sym) < 10) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Symptom!</strong> Should be higher than 10.
            </div>
            ';
        }

        if($ok){
            $stdadd = $db->prepare('INSERT INTO consultation(patientid, weight, pressure, temperature, symptom, status, arrivaldate, assignto, nurseid) VALUES(?, ?, ?, ?, ?, "pending", NOW(), ?, ?)');
            if($stdadd->execute(array($pid, $wei, $pres, $tem, nl2br($sym), $did, $_SESSION['id']))){

                echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>Sucess!</strong> Consulation Created Added.
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
