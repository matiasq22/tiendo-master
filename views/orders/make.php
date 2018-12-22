<?php if(isset($_SESSION['login'])) : ?>
<h1>Realizar Pedido</h1>
<p><a href="<?=base_url?>Carrito/index" class="button button-small">Volver Al Carrito</a></p><br>
    <h3>Direccion de envio:</h3>
<form action="<?=base_url?>Orders/add" method="POST">
    <label for="district">Provincia:</label>
    <input type="text" name="district"/>
    <label for="city">Ciudad:</label>
    <input type="text" name="city"/>
    <label for="address">Direccion:</label>
    <input type="text" name="address"/>
    <input type="submit" value="Confirmar"/>

</form>
<?php else: ?>
<h1>Por Favor Inicia Sesion</h1>
<p>Debes estar logueado para realizar pedidos</p>
<?php endif;?>
