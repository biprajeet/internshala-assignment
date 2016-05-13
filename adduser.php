<?php
  	function sendMail($address, $subject, $messgae)
    {
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'soumosirdutta@yahoo.in';                 // SMTP username
        $mail->Password = '9787122879';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('soumosirdutta@yahoo.in', 'Confirmation@BP');
        
        $mail->addAddress($address);               // Name is optional
        
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $messgae;
       

        if(!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
        return true;
    }
    $user='root';
    $pass='';
    $db='user';
    $con=new mysqli('localhost',$user,$pass,$db) or die("Unable to connect.");
    $fn=$_GET['fn'];
	$ln=$_GET['ln'];
	$email=$_GET['email'];
	$phone=$_GET['phone'];
	$pwd=$_GET['pwd'];
	$q="insert into user values(\"$fn\",\"$ln\",\"$email\",\"$phone\",\"$pwd\")";
	$result = mysqli_query($con,$q);
	if($result){
    $msg="Thank you for Registering.<br>Your username is : ".$email."<br>Your password is : ".$pwd.".";
    sendMail($email, "Confirmation mail", $msg);
    echo "Hi! ".$fn."  ".$ln."<br>Thank you for signing up, please check your inbox for a confirmation mail.";
    }
    else
    echo "Alas! Email-ID already registered.<br>Use a different Email-ID and try again.<br>Or Log In.";	
    mysqli_close($con);
?>