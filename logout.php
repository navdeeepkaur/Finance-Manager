<?php
session_start();
unset($_SESSION['user_type']);
unset($_SESSION['login_id']);
header("Location:login.php");
?>