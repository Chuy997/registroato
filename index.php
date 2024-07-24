<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Entrada de Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-box">
        <h1>Registro de Entrada de Empleados</h1>
        <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php
        // Limpiar el mensaje de error después de mostrarlo
        unset($_SESSION['error']);
        endif;
        ?>
        <form action="php/registrar_entrada.php" method="post">
            <div class="form-group">
                <input type="text" id="id_empleado" name="id_empleado" required>
                <label for="id_empleado">ID de Empleado</label>
            </div>
            <button type="submit" class="btn">
                Registrar Entrada
            </button>
        </form>
        <div id="mensaje_resistencia" class="mt-4 text-center">
            <!-- Mensaje permanente de resistencia -->
            Recuerda hacerte la prueba de resistencia antes de ingresar a ATO.
        </div>
        <?php if (isset($_GET['success']) && isset($_SESSION['nombre_empleado'])): ?>
        <div id="mensaje_bienvenida" class="mt-2 text-center">
            <!-- Mensaje de bienvenida -->
            ¡Bienvenido, <?php echo $_SESSION['nombre_empleado']; ?>!
        </div>
        <div id="mensaje_motivador" class="mt-2 text-center">
            <!-- Mensaje motivacional -->
            <?php
            $mensajes = [
                "¡Eres increíble!",
                "¡Sigue así!",
                "¡Tu esfuerzo vale la pena!",
                "¡Hoy es un gran día para alcanzar tus metas!",
                "¡Nunca te rindas!",
                "¡Cada día es una nueva oportunidad para mejorar!",
                "¡Tu dedicación es inspiradora!",
                "¡El éxito es el resultado de pequeños esfuerzos repetidos día tras día!",
                "¡Confía en ti mismo y todo será posible!",
                "¡La perseverancia siempre trae recompensas!",
                "¡Tu trabajo duro está dando frutos!",
                "¡Eres una pieza clave en nuestro equipo!",
                "¡El éxito es la suma de buenos hábitos!",
                "¡Cada pequeño paso te acerca a tu meta!",
                "¡Tu esfuerzo no pasa desapercibido!",
                "¡Cree en el proceso y disfruta del viaje!",
                "¡La excelencia no es un acto, sino un hábito!",
                "¡Tu compromiso marca la diferencia!",
                "¡El éxito está en tu actitud!",
                "¡Sigue adelante, lo mejor está por venir!",
                "¡El límite lo pones tú!",
                "¡Cada esfuerzo cuenta!",
                "¡Estás haciendo un gran trabajo!",
                "¡La actitud positiva trae resultados positivos!",
                "¡No hay obstáculos, solo oportunidades!",
                "¡Sigue adelante, tu esfuerzo es invaluable!",
                "¡El trabajo en equipo hace que el sueño funcione!",
                "¡Nunca subestimes el poder de tu contribución!",
                "¡Eres capaz de cosas increíbles!",
                "¡Cada día es una nueva oportunidad para brillar!"
            ];
            echo $mensajes[array_rand($mensajes)];
            ?>
        </div>
        <?php
        // Limpiar la sesión después de mostrar el mensaje
        session_unset();
        session_destroy();
        ?>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Enfocar el campo de entrada al cargar la página
            document.getElementById("id_empleado").focus();
        });
    </script>
</body>
</html>
