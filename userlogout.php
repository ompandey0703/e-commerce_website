<?php
session_start();
setcookie('useremail', $_SESSION['useremail'], time() - 86400, '/');
setcookie('userpassword', $_SESSION['userpassword'], time() - 86400, '/');
session_destroy();

?>
<script>
    location.replace('index.php');
</script>