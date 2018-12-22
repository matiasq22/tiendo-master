<?php
require_once 'models/orders/order.php';

class OrdersController
{
    public function index(){
        try{
            if (isset($_POST)){

            }
        }catch (Exception $e){

        }
    }

    public function make()
    {
        require_once 'views/orders/make.php';
    }

    public function add()
    {
        if (isset($_SESSION['login'])) {
            $user = $_SESSION['login'];
            if (isset($_POST)) {
                $stats = Utils::statsCarrito();
                $provincia = isset($_POST['district']) ? $_POST['district'] : false;
                $localidad = isset($_POST['city']) ? $_POST['city'] : false;
                $address = isset($_POST['address']) ? $_POST['address'] : false;
                if ($address && $provincia && $localidad) {
                    $order = new Order();
                    $order->setProvincia($provincia);
                    $order->setLocalidad($localidad);
                    $order->setAddress($address);
                    $order->setUserId($user->id);
                    $order->setPrice($stats['total']);

                    if ($order->save() && $order->save_detail()) {
                        $_SESSION['order'] = "complete";
                        Utils::deleteSession('carrito');
                    } else {
                        $_SESSION['order'] = "failed";
                    }
                }
            }
            header("Location:".base_url."Orders/success");
        } else {
            header("Location:" . base_url);
        }
    }

    public function success(){

        $order = new Order();
        $id = $order->getLast();
        $order->setId($id);
        $ord = $order->getJoinOne();

        Utils::dd($ord);
        die();
        require_once 'views/orders/success.php';
    }
}