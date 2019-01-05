<h1>Carrito de Productos</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Eliminar</th>
        </tr>

        <?php foreach ($carrito as $indice => $product) : ?>
            <tr>
                <td><?php if ($product['product']->image != null) : ?>
                        <img src="<?= base_url ?>/uploads/images/<?= $product['product']->image ?>"
                             class="img_carrito"/>
                    <?php else : ?>
                        <img src="assets/img/camiseta.png" class="img_carrito"/>
                    <?php endif; ?></td>
                <td>
                    <a href="<?= base_url ?>Products/view&id=<?= $product['product']->id ?>"><?= $product['product']->name ?></a>
                </td>
                <td><?= $product['product']->price ?></td>
                <td>
                    <?= $product['quantity'] ?>
                    <div class="updown-unidades">
                    <a href="<?=base_url?>Carrito/up&index=<?=$indice?>" class="button">+</a>
                    <a href="<?=base_url?>Carrito/down&index=<?=$indice?>" class="button">-</a>
                    </div>
                </td>
                <td><a href="<?= base_url ?>Carrito/remove&index=<?= $indice ?>" class="button button-red button-carrito">Quitar producto</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div class="delete-carrito">
        <a href="<?= base_url ?>Carrito/delete_all" class="button button-delete button-red">Vaciar Carrito</a>
    </div>
    <?php $stats = Utils::statsCarrito(); ?>
    <div class="total-carrito">
        <h3>Precio total: <?= $stats['total'] ?> $</h3>
        <a href="<?= base_url ?>Orders/make" class="button button-pedido">Realizar Pedido</a>
    </div>

<?php else: ?>
    <div class="alert_red"><h3> Sin Productos en el Carrito, Favor selecciona los productos que desea comprar </h3>
    </div>
<?php endif; ?>