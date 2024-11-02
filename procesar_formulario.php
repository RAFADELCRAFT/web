<?php
// Dirección de correo a la que se enviarán los datos del formulario
$destinatario = 'rafagonzacara123@gmail.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe y sanitiza los datos enviados desde el formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    // Asunto del correo
    $asunto = "Nuevo mensaje desde el formulario de contacto";
    
    // Cuerpo del mensaje
    $contenido = "Has recibido un nuevo mensaje del formulario de contacto:\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Correo Electrónico: $email\n";
    $contenido .= "Mensaje: $mensaje\n";
    
    // Encabezados del correo
    $headers = "From: no-reply@tudominio.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Envía el correo
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "El mensaje se ha enviado correctamente.";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtalo de nuevo.";
    }
}
?>
