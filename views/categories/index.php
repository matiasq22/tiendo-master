<h1>Categorias</h1>
<?php if (isset($_SESSION['create']) && $_SESSION['create'] == "complete"):?>
    <div class="alert_green"><strong>Registro Creado Exitosamente </strong></div><br>
<?php endif;?>
<a href="<?=base_url?>Category/create" class="button button-small">
    Crear Categoria
</a>
<table border="1">
    <th>Nombre</th>
    <?php while ($cate = $categories->fetch_object()):?>
        <tr>
            <td><?=$cate->name?></td>
        </tr>
    <?php endwhile;?>
</table>