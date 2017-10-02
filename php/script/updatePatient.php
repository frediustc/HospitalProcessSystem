<?php

    //add Patient
    if(isset($_POST['update'])){
        $ok = true;

        $fn = htmlspecialchars(trim($_POST['fn']));
        $nb = htmlspecialchars(trim($_POST['nb']));

        if(!preg_match('/^[0-9]{9}$/', $nb)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Number!</strong> Wrong Format.
            </div>
            ';
        }

        if(!preg_match('/^[a-zA-Z ]{5,100}$/', $fn)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>FullName!</strong> Wrong Format.
            </div>
            ';
        }

        if($ok){
            $stdadd = $db->prepare('UPDATE users SET fullname = ?, phone = ? WHERE id = ?');
            if($stdadd->execute(array(ucwords($fn), (int)$nb, $_GET['id']))){

                echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>Sucess!</strong> Patient Information Updated.
                </div>';
            }
            else {
                echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
            }
        }
    }
?>
