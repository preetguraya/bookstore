<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['email']);
header("location:my-account.php");


?>