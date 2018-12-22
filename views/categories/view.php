<?php if (isset($cat)) : ?>
    <h1>Productos por <?= $cat->name ?> </h1>
    <?php if (isset($products) && !$products->num_rows == 0) : ?>
        <?php while ($product = $products->fetch_object()) : ?>
            <div class="product">
                <a href="<?= base_url ?>Products/view&id=<?= $product->id ?>">
                    <?php if ($product->image != null) : ?>
                        <img src="<?= base_url ?>/uploads/images/<?= $product->image ?>"/>
                    <?php else : ?>
                        <img src="assets/img/camiseta.png"/>
                    <?php endif; ?>
                    <h2><?= $product->name ?> $</h2>
                </a>
                <p><?= $product->price ?> $</p>
                <a href="<?=base_url?>Carrito/add&id=<?=$product->id?>" class="button">Comprar</a>

            </div>
        <?php endwhile; ?>

    <?php else: ?>
        <div class="alert_red">No Hay Productos en esta Categoria</div>
    <?php endif; ?>

<?php else: ?>
    <h1>La categoria no existe</h1>

<?php endif; ?>
