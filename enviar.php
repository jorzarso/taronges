<?php
// Revisar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Recopilar los datos del formulario
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];
	
	// Construir el mensaje de correo electrónico
	$asunto = 'Nuevo mensaje de contacto desde el sitio web';
	$cuerpo = "Nombre: $nombre\nCorreo electrónico: $correo\nMensaje:\n$mensaje";
	$destinatario = 'tu@email.com';
	$headers = 'From: ' . $correo . "\r\n" .
	    'Reply-To: ' . $correo . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	
	// Enviar el correo electrónico
	if (mail($destinatario, $asunto, $cuerpo, $headers)) {
		// Si el correo electrónico se envió correctamente, redirigir al usuario a una página de confirmación
		header('Location: confirmacion.html');
		exit;
	} else {
		// Si hubo un error al enviar el correo electrónico, mostrar un mensaje de error
		echo 'Lo siento, hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.';
	}
}
?>
