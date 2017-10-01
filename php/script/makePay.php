<?php
    $change = false;
    if(isset($_POST['addPay'])){
        $ok = true;

        $pid = htmlspecialchars(trim($_POST['pid']));
        $pay = htmlspecialchars(trim($_POST['pay']));

        if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $pay)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Paid!</strong> Wrong Format.
            </div>
            ';
        }
        $cids = $db->prepare('SELECT id FROM consultation WHERE patientid = ? AND status = "pending"');
        $cids->execute(array($pid));
        $cid = $cids->fetch();
        if($ok){
            $payment = $db->prepare('INSERT INTO payment(pay, aid, pid, cid, paydate) VALUES(?, ?, ?, ?, NOW())');
            if($payment->execute(array($pay, $_SESSION['id'], $pid, $cid['id']))){

                $upd = $db->prepare('UPDATE consultation SET status = "queue" WHERE id = ?');
                if($upd->execute(array($cid['id']))){
                    echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                      </button>
                      <strong>Sucess!</strong> Consulation Created Added.
                    </div>';
                }
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
