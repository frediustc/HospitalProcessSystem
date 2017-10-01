<?php $change = false;
if(isset($_POST['finish'])){
    $ok = true;

    if(isset($_POST['lab']))
    {
        $lab = $db->prepare('INSERT INTO labexam (cid, status) VALUES(?, "queue")');
        $lab->execute(array($_GET['id']));
        echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>Success!</strong> Patient sent to the lab.
        </div>';
    }
    else {
        $note = htmlspecialchars(trim($_POST['note']));
        if(strlen($note) < 10) {
            $ok = false;
            echo '
            <div class="alert alert-danger alert-dismissible fade in show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <strong>Note!</strong> Should be higher than 10.
            </div>
            ';
        }
        if($ok){
            $stdadd = $db->prepare('INSERT INTO records(cid, did, cdate, note) VALUES(?, ?, NOW(), ?)');
            if($stdadd->execute(array($_GET['id'], $_SESSION['id'], nl2br($note)))){

                echo '<div class="alert alert-success alert-dismissible fade in show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <strong>Sucess!</strong> Consulation Done.
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
}
