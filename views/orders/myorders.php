<h1>Pedidos</h1>
<?php if (isset($_SESSION['order']) && $_SESSION['order'] == "complete"):?>
    <div class="alert_green"><strong>Registro Creado Exitosamente </strong></div><br>
<?php endif;?>
<a href="<?=base_url?>Category/create" class="button button-small">
    Crear Categoria
</a>
<table border="1">
    <th>Numero de orden</th>
    <th>Nombre</th>
    <th>Fecha</th>
    <th>Estado</th>
    <th>Acciones</th>
    <?php while ($order = $orders->fetch_object()):?>
        <tr>
            <td><?=$order->id?></td>
            <td><?=$order->name?></td>
            <td><?=$order->created_at?></td>
            <td><?=$order->status?></td>
            <td>

            </td>
        </tr>
    <?php endwhile;?>
</table>