
    <h1>Algunos De Nuestros Productos</h1>

    <?php while ($prod = $products->fetch_object()) :?>
        <div class="product">
            <a href="<?=base_url?>Products/view&id=<?=$prod->id?>">
                <?php if ($prod->image != null) : ?>
                <img src="<?=base_url?>/uploads/images/<?=$prod->image?>"/>
                <?php else : ?>
                <img src="assets/img/camiseta.png"/>
                <?php endif;?>
                <h2><?=$prod->name?> $</h2>
                </a>
            <p><?=$prod->price?> $</p>
            <a href="<?=base_url?>Carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>

        </div>
    <?php endwhile;?>

