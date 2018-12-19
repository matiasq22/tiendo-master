<?php

class User{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $profile;
    private $image;
    private $db;

    public function __construct()
    {
        $this->db=Database::connect();
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

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $this->db->real_escape_string($lastname);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=> 4]);
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
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


    public function  save(){
        $sql = "insert into users values (null, '{$this->getName()}','{$this->getLastname()}','{$this->getEmail()}','{$this->getPassword()}','user','null')";
        $save = $this->db->query($sql);

        $result = false;

        if ($save){
            $result = true;
        }
        return $result;
    }


    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        $sql = "select * from users where email = '$email'";
        $login = $this->db->query($sql);
        if ($login && $login->num_rows == 1){
            $user = $login->fetch_object();

            //Verificar pass

            $verify_pass = password_verify($password,$user->password);

            if ($verify_pass){
                $result = $user;
            }
        }

        return $result;
    }
}