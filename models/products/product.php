<?php

class Product
{
    private $id;
    private $name;
    private $categorie_id;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $image;
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
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * @param mixed $categorie_id
     */
    public function setCategorieId($categorie_id)
    {
        $this->categorie_id = $categorie_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $this->db->real_escape_string($description);
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
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @param mixed $offer
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    public function getAll()
    {
        $products = $this->db->query("select * from products order by id desc");
        return $products;
    }

    public function getRandom($limit){
        $products = $this->db->query("select * from products order by rand() limit $limit");
        return $products;
    }

    public function getByCategory(){
        $products = $this->db->query("select p.*, c.name as 'catname' from products p join categories c on p.categorie_id = c.id where p.categorie_id = {$this->getCategorieId()}");
        return $products;
    }
    public function getOne()
    {
        $products = $this->db->query("select * from products where id = {$this->getId()} ");
        return $products->fetch_object();
    }

    public function save()
    {
        try {
            /** @var TYPE_NAME $sql */
            $sql = "insert into products values (null,'{$this->getCategorieId()}','{$this->getName()}','{$this->getDescription()}',{$this->getPrice()},{$this->getStock()},null,now(),'{$this->getImage()}')";

            $save = $this->db->query($sql);
            $result = false;

            if ($save) {
                $result = true;
            }
        } catch (Exception $e) {
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";
        }
        return $result;
    }

    public function delete(){
        try{
            $sql = "delete from products where id = {$this->getId()}";

            $exe = $this->db->query($sql);
            $result = false;
            if($exe){
                $result = true;
            }
        }catch (Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";
        }
        return $result;
    }

    public function update(){
        try {
            /** @var TYPE_NAME $sql */
            $sql = "update products set categorie_id ={$this->getCategorieId()}, " .
                " name = '{$this->getName()}', description = '{$this->getDescription()}', " .
                " price = {$this->getPrice()}, stock = {$this->getStock()}, offer = null, image = '{$this->getImage()}' where id = {$this->getId()}";

            $save = $this->db->query($sql);
            $result = false;

            if ($save) {
                $result = true;
            }
        } catch (Exception $e) {
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";
            $result = false;

        }
        return $result;
    }


}