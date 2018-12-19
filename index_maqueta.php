<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Tienda de Camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css"/>
<body>
<div id="container">
    <!--CABECERA--->
    <header>
        <div id="logo">
            <img src="assets/img/camiseta.png" alt="Camiseta LOgo"/>
            <a href="index_maqueta.php">
                Tienda de Camisetas
            </a>
        </div>
    </header>

    <!--MENU--->
    <nav id="menu">
        <ul>
            <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                <a href="#">Categoria 1</a>
            </li>
            <li>
                <a href="#">Categoria 2</a>
            </li>
            <li>
                <a href="#">Categoria 3</a>
            </li>
            <li>
                <a href="#">Categoria 4</a>
            </li>
            <li>
                <a href="#">Categoria 5</a>
            </li>
        </ul>
    </nav>

    <div id="content">
    <!--BARRA LATERAL-->
    <aside id="lateral">
        <div id="login" class="block_aside">
            <h3>Entrar a la Web</h3>
            <form action="#" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="admin@admin.com"/>
                <label for="password">Contraseña</label>
                <input type="password" name="password"/>
                <input type="submit" value="Enviar"/>
            </form>

            <br>
            <ul>
                <li>
                    <a href="#">Mis Pedidos</a>
                </li>
                <li>
                    <a href="#">Gestionar Pedidos</a>
                </li>
                <li>
                    <a href="#">Gestionar Categorias</a>
                </li>
            </ul>
        </div>
    </aside>
        </div>
    <!---CONTENIDO CENTRAL-->
    <div id="central">
        <h1>Productos Destacados</h1>
        <div class="product">
            <img src="assets/img/camiseta.png"/>
            <h2>Camiseta Azul Ancha</h2>
            <p>30 euros</p>
            <a href="" class="button">Comprar</a>
        </div>

        <div class="product">
            <img src="assets/img/camiseta.png"/>
            <h2>Camiseta Azul Ancha</h2>
            <p>30 euros</p>
            <a href="" class="button">Comprar</a>
        </div>

        <div class="product">
            <img src="assets/img/camiseta.png"/>
            <h2>Camiseta Azul Ancha</h2>
            <p>30 euros</p>
            <a href="" class="button ">Comprar</a>
        </div>
    </div>


    <!---PIE DE PAGINA-->

    <footer id="footer">
        <p>
            Developed By Matias Quevedo &copy; <?= date('Y'); ?>
        </p>
    </footer>
</div>
</body>
</head>
</html>