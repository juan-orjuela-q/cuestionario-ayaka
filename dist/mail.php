<?php
if(isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])){
    //Post data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    //mail settings
    $header = "From: Lupa Creativa <lupacreativa@experienciasayaka.com>";
    $to = "jorge@experienciasayaka.com";
    $subject = 'Nuevo contacto - Estudio Temores';
    $body = <<<EMAIL

¡Hola!

Has recibido un nuevo mensaje de: $name.

Mensaje: $message.

Correo electrónico: $email
Número de contacto: $phone

Enviado desde https://experienciasayaka.com/estudiotemores/
EMAIL;

    if(mail($to, $subject, $body, $header)){
        $feedback = '¡Gracias por ponerte en contacto!';
    }else{
        $feedback = 'Se ha presentado un error, inténtalo de nuevo';
    }
}else{
    $feedback = 'Faltan campos';
}

echo $feedback;