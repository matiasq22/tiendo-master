<?php if (isset($gestion)) : ?>
    <h1>Gestionar Pedidos</h1>
<?php else: ?>
    <h1>Pedidos</h1>
<?php endif; ?>
<?php if (isset($_SESSION['order']) && $_SESSION['order'] == "complete"): ?>
    <div class="alert_green"><strong>Registro Creado Exitosamente </strong></div><br>
<?php endif; ?>
<?php Utils::deleteSession('order')?>
<table>
    <th>N° de orden</th>
    <th>Usuario</th>
    <th>Fecha</th>
    <th>Estado</th>
    <th>Total</th>
    <th>Acciones</th>
    <?php while ($order = $orders->fetch_object()): ?>
        <tr>
            <td><?= $order->id ?></td>
            <td><?= $order->name ?></td>
            <td><?= $order->created_at ?></td>
            <td><?=Utils::showStatus($order->status)?></td>
            <td><?= $order->price ?> $</td>
            <td>
                <a href="<?= base_url ?>Orders/view&id=<?= $order->id ?>" class="btn"><img
                            src="<?= base_url ?>assets/img/view.svg" style="width: 18%; height: 18%;"/></a>
                <a href="<?= base_url ?>Orders/edit&id=<?= $order->id ?>" class="btn"><img
                            src="<?= base_url ?>assets/img/edit.svg" style="width: 18%; height: 18%;"/></a>
                <a href="<?= base_url ?>Orders/delete&id=<?= $order->id ?>" class="btn"><img
                            src="<?= base_url ?>assets/img/delete1.svg" style="width: 18%; height: 18%;"/></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>