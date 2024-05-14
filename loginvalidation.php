<?php
include 'dbcon.php';
$useremail = $_POST['useremail'];
$userpassword = $_POST['userpassword'];
$res = $users->findOne(['useremail' => $useremail]);
$count = $users->count(['useremail' => $useremail]);
if ($count == 0) {
    // email not found in db
?>
    <script>
        alert("email not registered. Please sign-up");
        location.replace('usersignup.php');
    </script>
    <?php
} else {
    $dbpass = $res['userpassword'];
    $decode = password_verify($userpassword, $dbpass);
    if ($decode) {
        // login successful
        session_start();
        $_SESSION['username'] = $res['username'];
        $_SESSION['useremail'] = $res['useremail'];
        $_SESSION['userphone'] = $res['userphone'];
        $_SESSION['useraddress'] = $res['useraddress'];
        $_SESSION['userpassword'] = $res['userpassword'];
        $_SESSION['userid'] = $res['userid'];
        $_SESSION['userstatus'] = $res['status'];
        $_SESSION['unhashedpassword'] = $userpassword;

        if (isset($_POST['rememberme'])) {
            // set cookie of 7 days to remember user
            setcookie('useremail', $useremail, time() + 86400 * 7, '/');
            setcookie('userpassword', $userpassword, time() + 86400 * 7, '/');
        }

        // check if the user is blocked by admin
        if ($_SESSION['userstatus'] != "active") {
    ?>
            <script>
                alert("sorry, you are restricted by the admin");
                location.replace('userlogout.php');
            </script>
        <?php
        }
        ?>
        <script>
            location.replace('index.php');
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("invalid password");
            location.replace('userlogin.php');
        </script>
<?php
    }
}

?>