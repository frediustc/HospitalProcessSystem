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
        $_SESSION['fn'] = $user['fullname'];
        $_SESSION['bd'] = $user['birthday'];
        $_SESSION['gd'] = $user['sex'];
        $_SESSION['ph'] = $user['phone'];
        $roles = $db->prepare('SELECT type FROM usertype WHERE id = ?');
        $roles->execute(array($user['usertype']));
        $r = $roles->fetch();
        $_SESSION['r'] = $r['type'];
        if ($user['usertype'] == 6) {
            header('location: AdminDashboard.php');
        }
        else {
            header('location: Dashboard.php');
        }
    }
    else {
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> User not found or data do not match</div>';
    }
}
