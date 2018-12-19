<?php
require_once 'models/categories/category.php';
require_once 'models/products/product.php';

class CategoryController
{
    public function index()
    {
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/categories/index.php';
    }

    public function create()
    {
        Utils::isAdmin();

        require_once 'views/categories/create.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $name = $_POST['name'];

            $category = new Category();
            $category->setName($name);
            $save = $category->save();

            if ($save) {
                $_SESSION['create'] = "complete";
            } else {
                $_SESSION['create'] = "failed";
            }

        }

        header('Location:' . base_url . 'Category/index');

    }

    public function view(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //conseguir categoria
            $category = new Category();
            $category->setId($id);
            $cat = $category->getOne();

            //conseguir productos
            $product = new Product();
            $product->setCategorieId($id);
            $products = $product->getByCategory();


        }
        require_once 'views/categories/view.php';
    }
}