<h1>Carrito de Productos</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
    </tr>

    <?php foreach ($carrito as $indice => $product) :?>
            <tr>
                <td><?php if ($product['product']->image != null) : ?>
                        <img src="<?=base_url?>/uploads/images/<?=$product['product']->image?>" class="img_carrito"/>
                    <?php else : ?>
                        <img src="assets/img/camiseta.png" class="img_carrito"/>
                    <?php endif;?></td>
                <td><a href="<?=base_url?>Products/view&id=<?=$product['product']->id?>"><?=$product['product']->name?></a></td>
                <td><?=$product['product']->price?></td>
                <td><?=$product['quantity']?></td>
            </tr>
    <?php endforeach;?>
</table>

<div class="total-carrito">
    <h1>253</h1>
</div>