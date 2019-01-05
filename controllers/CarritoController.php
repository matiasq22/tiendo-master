<?php
require_once 'models/products/product.php';
require_once 'helpers/utils.php';

class CarritoController
{

    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {

            $carrito = $_SESSION['carrito'];
            }else{

            $carrito = array();
        }
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
        if (isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:".base_url."Carrito/index");
    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "Carrito/index");
    }

    public function up(){
        if (isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['quantity']++;
        }
        header("Location:".base_url."Carrito/index");
    }

    public function down(){
        if (isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['quantity']--;
            if ($_SESSION['carrito'][$index]['quantity'] == 0){
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location:".base_url."Carrito/index");
    }
}
