<?php
session_start();
$_SESSION['e']="2";
header("refresh:0; url=index.php");
?>