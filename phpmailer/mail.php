<?php
if(isset($_POST["submit"])){
    require 'phpmailer/PHPMailerAutoload.php';
        $email = $_POST["email"];
        $msg = $_POST["msg"];

        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ponbaskar397@gmail.com';                 // SMTP username or ur mailid
        $mail->Password = 'iambaskar1903';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    

        $mail->setFrom('ponbaskar397@gmail.com', 'baskar');
        $mail->addAddress($email);     // Add a recipient
       
       
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'sample mail test';
        $mail->Body    =  'message:' .$msg;
        

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTP</title>
</head>
<body>
    <form action="mail.php" method="post">
        To:<input type="email" name="email"><br>
        message:<input type="text" name="msg"><br>
        <input type="submit" value= "send" name="submit">
    </form>
</body>
</html>