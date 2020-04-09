<?php 

include_once('vendor/phpmailer/phpmailer/class.phpmailer.php');
include_once('vendor/phpmailer/phpmailer/class.smtp.php');
 

$msj = isset($_POST['asunto'] ) ? $_POST['asunto'] : '';

$para = 'usuario1@gmail.com';
$para2 = 'usuario2@gmail.com';


$fecha = date('d-m-y');
$asunto = 'Probando'.$fecha;
$mensaje = "Enviar informacion a: ".$msj;

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$mail->SMTPAuth = true;


$mail->Username ='usuario3@gmail.com';
$mail->Password = 'claveusuario3'; //Su password
$mail->FromName = "Nombre o Compañia"; 


$mail->AddAddress($para);
$mail->AddAddress($para2);

$mail->Subject = $asunto;


$mail->IsHTML(false);
$mail->Body = $mensaje;

if($mail->Send())
{
    echo'<script type="text/javascript">
            alert("Gracias por registrarte.");
            window.location="http://localhost/coming-soon/index.php"
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("Tu registro no fue exitoso. Intenta nuevamente.");
            window.location="http://localhost/coming-soon/index.php"
         </script>';
}
?>