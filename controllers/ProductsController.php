<?php
require_once 'models/products/product.php';

class ProductsController
{
    public function index()
    {
        $product = new Product();
        $products = $product->getRandom(6);
        require_once 'views/products/destacados.php';
    }

    public function gestion()
    {
        Utils::isAdmin();

        $product = new Product();
        $products = $product->getAll();

        require_once 'views/products/gestion.php';
    }

    public function create()
    {
        Utils::isAdmin();
        require_once 'views/products/create.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $des = isset($_POST['des']) ? $_POST['des'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $cate = isset($_POST['category']) ? $_POST['category'] : false;
            //$image = isset($_POST['image']) ? $_POST['image'] : false;

            $file = $_FILES['image'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            $validate = new Utils();
            $val = $validate->validateProductCreate($name, $des, $price, $stock, $mimetype);


            if (!is_dir('uploads/images')) {
                mkdir('uploads/images', 0777, true);
            }
            move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);

            if ($val['name'] == false) {
                $_SESSION['errors'] = "Ingrese un Nombre Valido";
            } elseif ($val['des'] == false) {

                $_SESSION['errors'] = "Ingrese una Descripcion Valida";
            } elseif ($val['price'] == false) {

                $_SESSION['errors'] = "Ingrese un Precio Valido";
            } elseif ($val['stock'] == false) {

                $_SESSION['errors'] = "Stock invalido";
            } elseif ($val['image'] == false) {
                $_SESSION['errors'] = "Favor Ingresar una imagen valida!";
            } else {
                $product = new Product();
                $product->setName($name);
                $product->setDescription($des);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategorieId($cate);
                $product->setImage($filename);
                if (isset($_POST['edit']) && isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $product->setId($id);
                    $save = $product->update();
                } else {
                    $save = $product->save();
                }
            }
            if ($save) {
                $_SESSION['create'] = "complete";
            } else {
                $_SESSION['create'] = "failed";
            }
            if (isset($_POST['edit']) && $_POST['id']) {
                header("Location:" . base_url . 'Products/edit&id=' . $_POST['id']);
            } else {
                header('Location:' . base_url . 'Products/create');
            }
        }
    }

    public function delete()
    {
        Utils::isAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['delete'] = "failed";

        $product = new Product();
        $product->setId($id);
        $bo = $product->delete();

        if ($bo) {
            $_SESSION['delete'] = "complete";
        } else {
            $_SESSION['delete'] = "failed";
        }

        header("Location:" . base_url . 'Products/gestion');
    }

    public function edit()
    {
        Utils::isAdmin();
        $edit = true;
        $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['edit'] == "failed";

        $product = new Product();
        $product->setId($id);
        $pro = $product->getOne();

        require_once 'views/products/create.php';
    }

    public function view(){

        $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['edit'] == "failed";

        $product = new Product();
        $product->setId($id);
        $pro = $product->getOne();

        require_once 'views/products/view.php';
    }

}

