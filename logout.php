<?php
error_reporting(0);
session_start();
#session_unset();
#session_destroy();
$_SESSION['e']="1";
header("refresh:0; url=index.php");
?>