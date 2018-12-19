<?php require_once 'models/categories/category.php';
$categories = Utils::showCategorys();
?>
<?php if (!isset($edit) && !isset($id)) : ?>
<h1>Crear Producto</h1>
<?php elseif(isset($edit) && isset($id) && isset($pro)): ?>
<h1>Editar Producto <?=$pro->description?></h1>
<?php endif; ?>
<?php if (isset($_SESSION['create']) && $_SESSION['create'] == "complete"): ?>
    <div class="alert_green"><strong>Registro Guardado Exitosamente </strong></div><br>
<?php elseif (isset($_SESSION['errors']) && $_SESSION['errors'] != null): ?>
    <div class="alert_red">
        <stong><?=$_SESSION['errors']?></stong>
    </div>
<?php elseif (isset($_SESSION['create']) && $_SESSION['create'] == "failed"): ?>
    <div class="alert_red"><strong>Fallo al guardar Registro</strong></div><br>
<?php endif; ?>
<?php Utils::deleteSession('errors'); ?>
<?php Utils::deleteSession('create'); ?>
<div class="form_container">
    <form action="<?= base_url ?>Products/save" method="post" enctype="multipart/form-data">
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?= isset($pro) ? $pro->name : null;?>"/>

        <label for="des">Descripcion:</label>
        <textarea name="des"><?= isset($pro) ? $pro->description : null;?></textarea>

        <label for="price">Precio:</label>
        <input type="number" name="price" value="<?= isset($pro) ? $pro->price : null;?>"/>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?= isset($pro) ? $pro->stock : null;?>"/>

        <label for="category">Categoria:</label>
        <select name="category">
            <?php while ($cate = $categories->fetch_object()): ?>
                <option value="<?= $cate->id ?>" <?=isset($pro) && $cate->id == $pro->categorie_id ? 'selected' : '' ?>>
                    <?= $cate->name ?></option>
            <?php endwhile; ?>

        </select>

        <label for="image">Imagen:</label>
            <?php if (isset($pro) && !empty($pro->image)) : ?>
                <img src="<?=base_url?>/uploads/images/<?=$pro->image?>" class="thumb"/>
        <?php endif;?>
        <input type="file" name="image"/>

        <?php if (!isset($edit) && !isset($id)) : ?>
            <input type="submit" value="Crear"/>
        <?php elseif(isset($edit) && isset($id)): ?>
            <input type="hidden" name="id" value="<?=$id?>"/>
            <input type="hidden" name="edit" value="<?=$edit?>"/>
            <input type="submit" value="Guardar"/>
        <?php endif; ?>


    </form>
</div>