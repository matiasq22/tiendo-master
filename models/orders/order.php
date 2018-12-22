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
        $orders = $this->db->query("select * from order_headers order by id desc");
        return $orders;
    }

    public function getOneByUser(){
        $orders = $this->db->query("select * from order_headers o join order_details d on d.header_id = o.id where o.id = {$this->getId()}");
        return $orders;
    }

    public function getOne()
    {
        $order = $this->db->query("select * from order_headers where id = {$this->getId()} ");
        return $order->fetch_object();
    }

    public function getLast(){
        try {
            $id = "select id as 'header_id' from order_headers order by id desc limit 1";
            $query = $this->db->query($id);
            $header_id = $query->fetch_object()->header_id;

        } catch (Exception $e) {
            Utils::dd("Excepcion capturarda:", $e->getMessage());
        }
        return $header_id;
    }

}