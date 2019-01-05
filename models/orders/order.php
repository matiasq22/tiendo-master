<?php

class Order
{
    private $id;
    private $user_id;
    private $provincia;
    private $localidad;
    private $price;
    private $address;
    private $status;
    private $created_at;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $this->db->real_escape_string($address);
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function save()
    {
        try {
            $sql = "insert into order_headers values (null, {$this->getUserId()},'{$this->getProvincia()}','{$this->getLocalidad()}'" .
                " ,'{$this->getAddress()}', {$this->getPrice()}, 'confirm', now())";

            $save = $this->db->query($sql);
            $result = false;

            if ($save) {
                $result = true;
            }
        } catch (Exception $e) {
            Utils::dd('Excepcion capturada: ', $e->getMessage(), "\n");
            $result = false;
        }
        return $result;
    }

    public function save_detail()
    {
        try {
            $id = "select last_insert_id() as 'header_id' ";
            $query = $this->db->query($id);
            $header_id = $query->fetch_object()->header_id;
            foreach ($_SESSION['carrito'] as $product) {
                $products = $product['product'];

                $sql = "insert into order_details values (null,{$header_id}, {$products->id}, {$product['quantity']})";
                $save = $this->db->query($sql);
            }
            $result = false;

            if ($save) {
                $result = true;
            }

        } catch (Exception $e) {
            Utils::dd("Excepcion capturarda:", $e->getMessage());
            $result = false;
        }
        return $result;
    }

    public function getAll()
    {
        $orders = $this->db->query("select o.id,o.created_at, o.status, o.price,u.name from order_headers o join users u on o.user_id = u.id order by id desc");
        return $orders;
    }

    public function getAllByUser()
    {
        $sql = "select o.*, u.name,o.address from order_headers o " .
            "join users u on o.user_id = u.id where o.user_id = {$this->getUserId()} order by o.id desc";
        $orders = $this->db->query($sql);
        return $orders;
    }

    public function getOneByUser()
    {
        $sql = "select o.id, o.price, o.created_at as 'fecha', u.name,o.address from order_headers o join order_details d on d.header_id = o.id " .
            "join users u on o.user_id = u.id where o.user_id = {$this->getUserId()} order by o.id desc limit 1";
        $orders = $this->db->query($sql);
        return $orders->fetch_object();
    }

    public function getOne()
    {
        $order = $this->db->query("select o.id,o.address,o.price,o.status, u.name from order_headers o join users u on u.id = o.user_id where o.id = {$this->getId()} ");
        return $order->fetch_object();
    }

    public function getProductsByOrder($id)
    {
        try {
            $sql = "select p.*, d.unidades from products p join order_details d on d.product_id = p.id " .
                " where d.header_id = $id";
            $products = $this->db->query($sql);

        } catch (Exception $e) {
            Utils::dd("Excepcion capturarda:", $e->getMessage());
        }
        return $products;
    }

    public function UpdateStatus()
    {
        try {
            $sql = "update order_headers set status = '{$this->getStatus()}' where id = {$this->getId()}";
            $update = $this->db->query($sql);

            if ($update) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            Utils::dd("Excepcion capturarda:", $exception->getMessage());
            return false;
        }
    }

}