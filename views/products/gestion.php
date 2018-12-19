<h1>Administrar Productos</h1>
    <a href="<?=base_url?>Products/create" class="button button-small">
        Crear Producto
    </a>
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"): ?>
    <div class="alert_green"><strong>Registro Eliminado Exitosamente </strong></div><br>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == "failed"): ?>
    <div class="alert_red"><strong>Fallo al eliminar Registro</strong></div><br>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
    <table border="1">
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
        <?php while ($prod = $products->fetch_object()):?>
            <tr>
                <td><?=$prod->name?></td>
                <td><?=$prod->price?></td>
                <td><?=$prod->stock?></td>
                <td><a href="<?=base_url?>Products/edit&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>Products/delete&id=<?=$prod->id?>" class="button button-gestion button-red">Eliminar</a></td>
            </tr>
        <?php endwhile;?>
    </table>