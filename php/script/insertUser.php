<?php
    $change = false;
    if(isset($_POST['add'])){
        $ok = true;

        $un = htmlspecialchars(trim($_POST['un']));
        $fn = htmlspecialchars(trim($_POST['fn']));
        $nb = htmlspecialchars(trim($_POST['nb']));
        $bd = htmlspecialchars(trim($_POST['bd']));
        $sx = htmlspecialchars(trim($_POST['sex']));
        $ut = htmlspecialchars(trim($_POST['ut']));
        $ps = htmlspecialchars(trim($_POST['ps']));
        $cn = htmlspecialchars(trim($_POST['cn']));

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

        if(!preg_match('/^[a-zA-Z]{5,32}$/', $un)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>UserName!</strong> Wrong Format.
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

        if(!preg_match('/^[0-9]{4}(\-)[0-9]{2}(\-)[0-9]{2}$/', $bd)) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>BirthDay!</strong> Wrong Format.
            </div>
            ';
        }

        if($sx != 'Male' && $sx != 'Female'){
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Sex!</strong> Undefined.
            </div>
            ';
        }

        $check = $db->prepare('SELECT COUNT(*) AS nbr FROM users WHERE username = ?');
        $check->execute(array($un));
        $result = $check->fetch();

        if($result['nbr'] > 0){
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Username!</strong> Already exists.
            </div>
            ';
        }

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
            $stdadd = $db->prepare('INSERT INTO users(fullname, phone, sex, birthday, usertype, registrationdate, username, pass) VALUES(?, ?, ?, ?, ?, NOW(), ?, ?)');
            if($stdadd->execute(array(ucwords($fn), (int)$nb, $sx, $bd, $ut, $un, sha1($ps)))){

                echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>Sucess!</strong> Employee Added.
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
