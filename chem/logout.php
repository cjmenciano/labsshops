<?php
session_start();
unset($_SESSION['verified_user_id']);
unset($_SESSION['idTokenString']);
session_unset();
session_destroy();

header('location:logout.html');
exit();
?>