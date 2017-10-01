<?php
if (isset($_POST['login'])) {
    $un = htmlspecialchars(trim($_POST['un']));
    $ps = htmlspecialchars(trim($_POST['ps']));

    $check = $db->prepare('SELECT * FROM users WHERE username = ? AND pass = ?');
    $check->execute(array($un, sha1($ps)));
    if($user = $check->fetch()){
        $_SESSION['id'] = $user['id'];
        $_SESSION['ut'] = $user['usertype'];
        $_SESSION['un'] = $user['username'];
        $roles = $db->prepare('SELECT type FROM usertype WHERE id = ?');
        $roles->execute(array($user['usertype']));
        $r = $roles->fetch();
        $_SESSION['r'] = $r['type'];
        switch ($user['usertype']) {
            case 2:
                header('location: NurseDashboard.php');
                break;
            case 3:
                header('location: LabDashboard.php');
                break;
            case 4:
                header('location: AccountDashboard.php');
                break;
            case 5:
                header('location: DoctorDashboard.php');
                break;
            case 6:
                header('location: AdminDashboard.php');
                break;
            default:
                echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Wrong usertype</div>';
                break;
        }
    }
    else {
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> User not found or data do not match</div>';
    }
}
