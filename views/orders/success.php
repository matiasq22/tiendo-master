<?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'complete') : ?>
    <div class="alert_green"><h1>Pedido Confirmado Correctamente!</h1></div>
    <p>
        Tu pedido ha sido registrado con exito, una vez realizado el pago, sera procesado y enviado.
    </p>
    <br/>
    <h3>Datos del Pedido: </h3>
    <?php if (isset($order) ? $order: false) : ?>
            Numero de Pedido:     <?= $order->id ?> <br>
            Usuario:     <?=$order->name?><br>
            Direccion:   <?= $order->address ?><br>
            Total a pagar:  <?= $order->price ?><br>
            Productos:
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            <?php while ($product = $products->fetch_object()) : ?>
            <tr>
                <td><?php if ($product->image != null) : ?>
                        <img src="<?= base_url ?>/uploads/images/<?= $product->image ?>" class="img_carrito"/>
                    <?php else : ?>
                        <img src="assets/img/camiseta.png" class="img_carrito"/>
                    <?php endif; ?></td>
                <td>
                    <a href="<?= base_url ?>Products/view&id=<?= $product->id ?>"><?= $product->name ?></a>
                </td>
                <td><?= $product->price ?></td>
                <td><?= $product->unidades?></td>
            </tr>
            <?php endwhile;?>
    </table>

    <?php endif;?>
<?php elseif (isset($_SESSION['order']) && $_SESSION['order'] == 'failed'): ?>
    <div class="alert_red"><h1>No se pudo registrar el Pedido</h1></div>
<?php endif; ?>
<br/>
<a href="<?=base_url?>" class="button button-pedido">Aceptar</a>