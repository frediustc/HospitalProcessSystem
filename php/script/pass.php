<?php
if(isset($_POST['update'])){
    $ok = true;

    $ps = htmlspecialchars(trim($_POST['ps']));
    $cn = htmlspecialchars(trim($_POST['cn']));

    if(strlen($ps) < 5 || strlen($ps) > 16){
        $ok = false;
        echo '
        <div class="alert alert-danger alert-dismissible fade in show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Pasword!</strong> Wrong Lenght.
        </div>
        ';
    }

    if($ps != $cn){
        $ok = false;
        echo '
        <div class="alert alert-danger alert-dismissible fade in show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Confirm!</strong> Do not match.
        </div>
        ';
    }
    if($ok){
        $stdadd = $db->prepare('UPDATE users SET pass = ? WHERE id = ?');
        if($stdadd->execute(array(sha1($ps), $_SESSION['id']))){

            echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Success!</strong> Password updated.
            </div>';
        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
        }
    }
}

 ?>
