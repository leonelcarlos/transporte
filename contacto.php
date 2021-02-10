<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $subject = "";
    $message = "";
     
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }
     
    
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }
     
    /******** colocar aqui el correo electronico de la empresa********/

    //$recipient = "correoDeLaEmpresa@gmail.com";
    
    $recipient = "dante.villazante07@gmail.com";
    
    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($recipient,$subject, $message, $headers)) {
       
        echo "<script>alert('El correo fue enviado con éxito');
        window.location='index.html'; </script>";

    } else {
       
        echo "<script>alert('Disculpe no se pudo enviar el email');
        window.location='index.html'; </script>";
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>