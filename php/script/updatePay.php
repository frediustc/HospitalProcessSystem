<?php
    $change = false;
    if(isset($_POST['editPay'])){
        $ok = true;

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
        
        if($ok){
            $payment = $db->prepare('UPDATE payment SET pay = ? WHERE id = ?');
            if($payment->execute(array($pay, $_GET['id']))){
                echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>Sucess!</strong> Payment Updated.
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
