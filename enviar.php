<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar los datos del formulario
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $email = trim(htmlspecialchars($_POST['email']));
    $mensaje = trim(htmlspecialchars($_POST['mensaje']));

    // Validar el correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido.";
        exit;
    }

    // Configuración del correo
    $to = "bossbrayan51@gmail.com"; // Dirección de correo a la que se enviará el mensaje
    $subject = "Nuevo mensaje de contacto de $nombre";
    $body = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
