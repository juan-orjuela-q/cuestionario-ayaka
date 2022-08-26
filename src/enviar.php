<?php 
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
    $telefonto = $_POST['tel'];
	$mensaje = "Nombre: ".$nombre."<br> Email: $email<br> Mensaje:".$_POST['mensaje'];


	if(mail('pablo@appicua.com', $asunto, $mensaje)){
		echo "Correo enviado";
	}
 ?>