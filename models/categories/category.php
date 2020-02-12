<?php
class Category{
    private $id;
    private $name;
    private $db;

    public function __construct(){
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

    public function save(){

        $sql = "insert into categories values (null, '{$this->getName()}')";
        $save = $this->db->query($sql);

        $result = false;

        if ($save){
            $result = true;
        }
        return $result;


    }

    public function getAll(){
        // var_dump($db);die();
        $categories = $this->db->query("Select * from categories order by id desc");
        return $categories;
    }

    public function getOne(){
        $categories = $this->db->query("Select * from categories where id = {$this->getId()}");
        return $categories->fetch_object();
    }
}

