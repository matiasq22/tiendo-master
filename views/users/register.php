<h1>Registrarse</h1>

    <?php
    if (isset($_SESSION['register']) && $_SESSION['register'] == "complete"):?>
        <div class="alert_green"><strong>Usuario Registrado con Exito</strong></div>
    <?php elseif(isset($_SESSION['errors']) && $_SESSION['errors'] != null): ?>
    <div class="alert_red"><stong><?=$_SESSION['errors']?></stong></div>
    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == "failed"):?>
    <div class="alert_red"><strong>Registro Fallido</strong></div>
    <?php endif;?>
    <?php Utils::deleteSession('errors');?>
    <?php Utils::deleteSession('register');?>
    <form action="<?=base_url?>Users/save" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" />

        <label for="lastname">Apellidos:</label>
        <input type="text" name="lastname" />

        <label for="email">Email:</label>
        <input type="email" name="email" />

        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" />

        <input type="submit" value="Enviar"/>
    </form>