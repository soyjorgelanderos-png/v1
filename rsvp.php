<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar asistencia</title>
</head>
<body>
    <h2>Confirma tu asistencia</h2>
    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Tu nombre" required>
        <input type="text" name="telefono" placeholder="Tu teléfono">
        <select name="confirmado">
            <option value="Si">Sí asistiré</option>
            <option value="No">No podré asistir</option>
        </select>
        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $confirmado = $_POST['confirmado'];

        $sql = "INSERT INTO invitados (nombre, telefono, confirmado) VALUES ('$nombre', '$telefono', '$confirmado')";
        if ($conn->query($sql) === TRUE) {
            header("Location: gracias.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
