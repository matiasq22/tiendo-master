<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css"/>
<body>
<div id="container">
    <!--CABECERA--->
    <header>
        <div id="logo">
            <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta LOgo"/>
            <a href="<?=base_url?>index_maqueta.php">
                Tienda de Camisetas
            </a>
        </div>
    </header>

    <!--MENU--->
    <?php $categories = Utils::showCategorys();?>
    <nav id="menu">
        <ul>
            <li>
                <a href="<?=base_url?>">Inicio</a>
            </li>
            <?php while ($cat = $categories->fetch_object()) : ?>
                <li>
                    <a href="<?=base_url?>Category/view&id=<?=$cat->id?>"><?=$cat->name?></a>
                </li>
            <?php endwhile; ?>

        </ul>
    </nav>

    <div id="content">