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

        $mail->setFrom('soumosirdutta@yahoo.in', 'Recovery@BP');
        
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
    $email=$_GET['email'];
    $user='root';
    $pass='';
    $db='user';
    $con=new mysqli('localhost',$user,$pass,$db) or die("Unable to connect.");
    $q="select * from user where email=\"$email\"";
    $result = mysqli_query($con,$q);
    $count=mysqli_num_rows($result);
    $array=mysqli_fetch_assoc($result);
    if($count==1){
    $msg="Hi! ".$array['fn']." ".$array['ln'].".<br>The password for the user-account with email-id : ".$email." is : ".$array['pass'].".";
    $msg=$msg."<br>Click <a href=\"http://localhost/bipro/hello/Project/l.php\">here</a> to go to login page.";
    sendMail($email, "Password Recovery Mail", $msg);
    echo "Password has been sent to your registered email-id.".$email;
    }
    else
    echo "Alas! Email Id not registered.";    
    mysqli_close($con);
    ?>