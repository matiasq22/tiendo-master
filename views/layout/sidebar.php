<!--BARRA LATERAL-->
<aside id="lateral">
    <div id="carrito" class="block_aside">
        <h3>Mi Carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito()?>
            <li><a href="<?=base_url?>Carrito/index">Ver mi carrito</a></li>
            <li><a href="<?=base_url?>Carrito/index">Productos (<?=$stats['count']?>)</a></li>
            <li><a href="<?=base_url?>Carrito/index">Total: <?=$stats['total']?> $</a></li>
        </ul>
    </div>
    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['login'])): ?>

            <h3>Entrar a la Web</h3>
            <form action="<?= base_url ?>Users/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="admin@admin.com"/>
                <label for="password">Contraseña</label>
                <input type="password" name="password"/>
                <input type="submit" value="Enviar"/>
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['login']->name ?> <?= $_SESSION['login']->lastname ?></h3>
        <?php endif; ?>


        <br>
        <ul>
            <?php if (isset($_SESSION['admin'])): ?>
                <li>
                    <a href="#">Gestionar Pedidos</a>
                </li>
                <li>
                    <a href="<?=base_url?>Products/gestion">Gestionar Productos</a>
                </li>
                <li>
                    <a href="<?=base_url?>Category/index">Gestionar Categorias</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (!isset($_SESSION['login'])): ?>
        <li>
            <a href="<?= base_url ?>Users/register">Registrarse</a>
        </li>

    <?php else :?>
        <li>
            <a href="<?=base_url?>Orders/myOrders">Mis Pedidos</a>
        </li>
    <br/>
        <a href="<?=base_url?>Users/logout" class="button button-small button-red">Cerrar Sesion</a>
    <?php endif; ?>
    </div>
</aside>


<!---CONTENIDO CENTRAL-->
<div id="central">