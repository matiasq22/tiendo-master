<?php if (isset($pro)) : ?>
    <h1><?= $pro->name ?> </h1>
    <?php if (isset($pro) && !empty($pro) && is_object($pro)) : ?>
        <div id="detail-product">
            <div class="image">
                <?php if ($pro->image != null) : ?>
                    <img src="<?= base_url ?>/uploads/images/<?= $pro->image ?>"/>
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png"/>
                <?php endif; ?>
            </div>
            <div class="data">
                <h2><?= $pro->description ?></h2>
                <p><?= $pro->price ?> $</p>
                <a href="<?=base_url?>Carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert_red">No Hay Productos en esta Categoria</div>
    <?php endif; ?>

<?php else: ?>
    <div class="alert_red">El Producto no existe</div>

<?php endif; ?>
