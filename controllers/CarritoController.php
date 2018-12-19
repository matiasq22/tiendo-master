<?php
require_once 'models/products/product.php';
require_once 'helpers/utils.php';

class CarritoController
{

    public function index()
    {
        $carrito = $_SESSION['carrito'];


        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $id_prod = $_GET['id'];

        } else {
            header("Location:" . base_url);
        }
        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $element) {
                if ($element['product_id'] == $id_prod) {
                    $_SESSION['carrito'][$indice]['quantity']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            //Traer producto
            $product = new Product();
            $product->setId($id_prod);
            $product = $product->getOne();

            //Agregar carrito
            if (is_object($product)) {
                $_SESSION['carrito'][] = array(
                    "product_id" => $product->id,
                    "quantity" => 1,
                    "product" => $product
                );
            }
        }

        header("Location:" . base_url . "Carrito/index");
    }

    public function remove()
    {

    }

    public function delete_all()
    {

        unset($_SESSION['carrito']);
        header("Location:" . base_url . "Carrito/index");
    }


}
