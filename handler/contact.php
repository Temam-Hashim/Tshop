<?php
require_once "../includes/db.php";
require_once "../phpMailer/mailer.php";

$name = $connect->real_escape_string($_POST['name']);
$email = $connect->real_escape_string($_POST['email']);
$msg = $connect->real_escape_string($_POST['message']);
$subject = $connect->real_escape_string($_POST['subject']);
$company= $connect->real_escape_string($_POST['company']);
if(empty($name)){
    header("Location: ../contact.php?warning='<div class='alert alert-danger'>Please enter your name</div>'");
}
else if(empty($email)){
    header("Location:../contact.php?warning='<div class='alert alert-danger'>Email Field can not be empty</div>'");
}
else if(empty($msg)){
    header("Location:../contact.php?warning='<div class='alert alert-danger'>Message Field can not be empty</div>'");
}
else{
    $sql = "INSERT INTO `contact`(`name`,`email`,`msg`,`subject`,`company`) VALUES('$name','$email','$msg','$subject','$company')";

    $result = $connect->query($sql);

    if($result){
        // send email to admin
        single_mail('ourgroupemail2018@gmail.com',$email,$subject,$msg);
        header("Location:../contact.php?warning='<div class='alert alert-success'>Message Sent successfully</div>'");
    }else{
        header("Location:../contact.php?warning='<div class='alert alert-danger'>Failed to Send Message Please try again </div>'");
    }

}

?>