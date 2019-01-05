<h1>Detalle del Pedido</h1>
   <br/>
<?php if (isset($_SESSION['changeStatus']) && $_SESSION['changeStatus'] == "complete"): ?>
<div class="alert_green"><h3>Status Actualizado Correctamente!</h3></div>
<?php elseif (isset($_SESSION['changeStatus']) && $_SESSION['changeStatus'] == "failed") : ?>
<div class="alert_red"><h3>Ocurrio un Error al actualizar!</h3></div>
<?php endif;?>
<?php Utils::deleteSession('changeStatus')?>
<?php if(Utils::isAdmin()): ?>
<h3>Cambiar Estado del Pedido</h3>
<form action="<?=base_url?>Orders/status" method="post">
    <select name="status">
        <option value="confirm">Pendiente</option>
        <option value="preparation">En Preparacion</option>
        <option value="ready">Preparado</option>
        <option value="sended">Enviado</option>
    </select>
    <input type="hidden" value="<?=$order->id?>" name="id"/>
    <input type="submit" value="Cambiar estado"/>
</form>
<br/>
<?php endif;?>
    <h3>Datos del Pedido: </h3>
    <?php if (isset($order) ? $order: false) : ?>
            Numero de Pedido:     <?= $order->id ?> <br>
            Estado:  <?=Utils::showStatus($order->status)?><br>
            Usuario:     <?=$order->name?><br>
            Direccion:   <?= $order->address ?><br>
            Total a pagar:  <?= $order->price ?> $<br>
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
<br/>
<a href="<?=base_url?>" class="button button-pedido">Aceptar</a>