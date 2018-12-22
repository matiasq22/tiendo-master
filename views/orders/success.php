<?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'complete') : ?>
    <div class="alert_green"><h1>Pedido Confirmado Correctamente!</h1></div>
    <p>
        Tu pedido ha sido registrado con exito, una vez realizado el pago, sera procesado y enviado.
    </p>
    <br/>
    <h3>Datos del Pedido: </h3>
        <p>
            Numero de Pedido: <?= $ord->id ?> <br>
            Usuario:
            Direccion: <?= $ord->address ?><br>
            Total: <?= $ord->price ?><br>
            Productos:
        </p>
<?php elseif (isset($_SESSION['order']) && $_SESSION['order'] == 'failed'): ?>
    <div class="alert_red"><h1>No se pudo registrar el Pedido</h1></div>
<?php endif; ?>
