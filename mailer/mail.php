<?php

    sendMail('challengeme.sish@gmail.com', "Test Mail from PHP Mailer", "HEllo how are you");
    function sendMail($address, $subject, $messgae)
    {
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'sen_swapnil@yahoo.in';                 // SMTP username
        $mail->Password = 'suchetadas';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('sen_swapnil@yahoo.in', 'Swapnil');
        //$mail->addAddress('aanthoniraj@vit.ac.in', 'Anthoniraj A');     // Add a recipient
        $mail->addAddress($address);               // Name is optional
        /*$mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $messgae;
        //ail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
            return true;
        }
    }
?>​