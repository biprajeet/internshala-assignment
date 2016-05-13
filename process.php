<?php
function Redirect($url){
	header('Location: '.$url);
	exit();
}
	session_start();
  	$user='root';
    $pass='';
    $db='user';
    $con=new mysqli('localhost',$user,$pass,$db) or die("Unable to connect.");

    $email=$_GET['email'];
	$pwd=$_GET['pwd'];
	$q="select * from user where email=\"$email\" and pass=\"$pwd\"";
	$result = mysqli_query($con,$q);
	$count=mysqli_num_rows($result);
	$array=mysqli_fetch_assoc($result);

	if($count==1){
	$_SESSION['fn']=$array['fn'];$_SESSION['ln']=$array['ln'];$_SESSION['email']=$array['email'];$_SESSION['phone']=$array['phone'];
	Redirect('home.php');
	}
	else {
	$_SESSION['e']="0";
	Redirect('index.php');
	}
	mysqli_close($con);
?>