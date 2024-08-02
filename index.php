<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Entrada ATO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-box">
        <h1>Registro de Entrada ATO</h1>
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
            $mensajes_generales = [
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
                "¡Cada día es una nueva oportunidad para brillar!",
                "Hoy es un buen día para ser increíble… o al menos intentarlo con una sonrisa.",
                "Recuerda, incluso las tortugas llegan a la meta, ¡así que sigue avanzando!",
                "Tu único límite es el café que aún no has tomado.",
                "Trabaja duro y sé amable, ¡y tal vez te den una galleta de la suerte al final del día!",
                "Eres capaz de hacer cosas increíbles… y de sobrevivir a los lunes, ¡así que ya eres un héroe!",
                "Levántate y brilla… o al menos, levántate y brilla después de tu segunda taza de café.",
                "Recuerda que eres único… al igual que todos los demás, ¡así que sé tu mejor versión!",
                "No te preocupes por los fracasos; los mejores inventos comenzaron con un gran '¡Ups!'",
                "Haz lo que amas y no trabajarás ni un solo día… bueno, eso dicen, ¡pero seguro que será más divertido!",
                "Hoy es el primer día del resto de tu semana laboral, ¡haz que cuente!",
                "Si la vida te da limones, haz limonada… o pide una margarita, ¡tú decides!",
                "El éxito es 1% inspiración y 99% café.",
                "El trabajo duro nunca mató a nadie, ¡pero no corras riesgos innecesarios!",
                "Eres tan brillante que hasta el sol necesita gafas de sol cuando te ve.",
                "El secreto del éxito es empezar antes de estar listo… y terminar antes de rendirte.",                
                "Hoy es un buen día para ser increíble… o al menos intentarlo con una sonrisa.",
                "Recuerda, incluso las tortugas llegan a la meta, ¡así que sigue avanzando!",
                "Tu esfuerzo hoy es el engranaje que mantiene todo en movimiento.",
                "Trabaja duro y sé amable, ¡y tal vez encuentres un bonus sorpresa!",
                "Eres capaz de hacer cosas increíbles… y de mantener la oficina en orden, ¡así que ya eres un héroe!",
                "Levántate y brilla… o al menos, asegúrate de no quedarte dormido en tu escritorio.",
                "Recuerda que eres único… al igual que cada documento en esta oficina, ¡así que sé tu mejor versión!",
                "No te preocupes por los fracasos; las mejores ideas comenzaron con un '¡Oops!' en el trabajo.",
                "Haz lo que amas y no trabajarás ni un solo día… bueno, eso dicen, ¡pero seguro que será más divertido!",
                "Hoy es el primer día del resto de tu semana laboral, ¡haz que cuente!",
                "Si la vida te da problemas, conviértelos en oportunidades.",
                "El éxito es 1% inspiración y 99% transpiración en la oficina.",
                "El trabajo duro nunca mató a nadie, ¡pero no corras riesgos innecesarios en el trabajo!",
                "Eres tan brillante que incluso las luces de la oficina parecen opacas.",
                "El secreto del éxito es empezar antes de estar listo… y terminar antes de quedarte sin energía.",
                "El único drama que necesitas en tu vida es cuando la impresora se queda sin papel.",
                "Si puedes soñarlo, puedes lograrlo… después de terminar ese informe, claro.",
                "Trabaja duro, pero no olvides reírte de vez en cuando. ¡Es una orden del jefe de la felicidad!",
                "Las metas son como los plazos: a veces se acercan rápido, pero siempre puedes planificar mejor.",
                "Recuerda que incluso los expertos necesitan una pausa de vez en cuando.",
                "Si el plan A no funciona, no te preocupes, ¡el abecedario tiene 25 letras más!",
                "La vida es corta, sonríe mientras aún tengas tareas pendientes.",
                "El éxito es como una buena reunión: ¡mejor cuando todos participan!",
                "La paciencia es una virtud, pero una buena pausa también ayuda.",
                "El trabajo en equipo divide el trabajo y multiplica la eficiencia.",
                "Si la montaña no viene a ti, construye un atajo.",
                "Hoy es un buen día para tener un buen día. ¡Hazlo inolvidable en tu trabajo!",
                "La perseverancia es la clave… y la organización también ayuda.",
                "Trabaja duro y sueña en grande. ¡Incluso si tu jornada acaba de comenzar!"
            ];
            $mensajes_302484 = [
                "Venir a trabajar es como hacer dieta: sabes que es bueno para ti, pero duele.",
                "Tranquilo, si no vienes hoy, las reuniones interminables te esperarán mañana.",
                "Si no vinieras a trabajar, al menos alguien tendría una silla más cómoda.",
                "Tu esfuerzo es invaluable, casi tanto como un día libre que nunca te darán.",
                "Aquí somos como una familia… una disfuncional, claro.",
                "Venir a trabajar es como un deporte extremo, pero sin la diversión.",
                "El único reconocimiento que recibirás es cuando no aparezcas y se den cuenta de cuánto trabajo tienes.",
                "Si no vienes a trabajar, el café será extrañamente menos amargo.",
                "Venir aquí es como una aventura diaria… pero de esas que preferirías evitar.",
                "Tu presencia ilumina la oficina… más que nada porque sabemos que tendrás que hacer el trabajo pesado.",
                "Aquí tu trabajo es tan valioso como un bolígrafo sin tinta.",
                "Si decides no venir hoy, prometo decirle a todos que sigues atrapado en el tráfico… de tu sofá a la cama.",
                "Tus ideas son tan innovadoras que a veces ni tú las entiendes.",
                "Venir a trabajar es como ver un capítulo repetido de una serie aburrida.",
                "El trabajo en equipo es fantástico, siempre y cuando alguien más haga el trabajo."
            ];

            $id_empleado = $_SESSION['id_empleado'] ?? null;
            if ($id_empleado == 302484) {
                $mensajes = $mensajes_302484;
            } else {
                $mensajes = $mensajes_generales;
            }
            
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
    <script src="https://cdn.jsdelivr.com/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Enfocar el campo de entrada al cargar la página
            document.getElementById("id_empleado").focus();
        });
    </script>
</body>
</html>
