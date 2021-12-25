<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Tshop\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\Tshop\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Tshop\vendor\phpmailer\phpmailer\src\SMTP.php';

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

//Load Composer's autoloader
require '../vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
function single_mail($to,$from,$subject,$body){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'ourgroupemail2018@gmail.com';                     //SMTP username
            $mail->Password   = 'hosrrbkifffxdibq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($from, 'Tshop Contact Enquire');
            $mail->addAddress($to, 'Temam');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo($from, 'REPLAY FROM Tshop');
            // $mail->addCC('ourgroupemail2018@gmail.com');
            // $mail->addBCC('ourgroupemail2018@gmail.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('images/logo.png', 'AGRO LOGO');    //Optional name

             // send html content
           //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo "<script>alet('Email Sent')</script>";


        } catch (Exception $e) {

                  echo $e->getMessage();


        }
}
// single_mail("ourgroupemail2018@gmail.com","temamhashim3@gmail.com","Test Email","This is test Email for your site");

function multi_mail($subject,$body){

  $mail = new PHPMailer(true);

  try {

      //Server settings

      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

      $mail->isSMTP();                                            //Send using SMTP

      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through

      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

      $mail->Username   = 'ourgroupemail2018@gmail.com';                     //SMTP username

      $mail->Password   = 'hosrrbkifffxdibq';                               //SMTP password

      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

      $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above



      //Recipients

      $mail->setFrom('ourgroupemail2018@gmail.com', 'AGRO WEB USER');

      // get address from user table

      global $conn;

      $result = mysqli_query($conn, 'SELECT user_email,username FROM users');

      foreach($result as $row){

           $mail->addAddress($row['user_email'], $row['username']);

      }



      // $mail->addAddress('ellen@example.com');               //Name is optional

      $mail->addReplyTo($from, 'REPLAY FROM AGRO WEB');

      // $mail->addCC('ourgroupemail2018@gmail.com');

      // $mail->addBCC('ourgroupemail2018@gmail.com');



      //Attachments

      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments

     // $mail->addAttachment('images/logo.png', 'AGRO LOGO');    //Optional name



       // send html content

     //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);



      //Content

      $mail->isHTML(true);                                  //Set email format to HTML

      $mail->Subject = $subject;

      $mail->Body    = $body;

      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



      $mail->send();

      echo "<script>alet('Email Sent')</script>";





  } catch (Exception $e) {



            echo $e->getMessage();





  }

}



?>
