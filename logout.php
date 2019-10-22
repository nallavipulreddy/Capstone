<?php
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['verified']);
unset($_SESSION['channel_id']);
unset($_SESSION['auth_key']);
header("location: login.php");
?>