<?php
class Utils{
    public static function deleteSession($name){
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public function validateVars($name,$lastname,$email,$password){

//validar nombre
        if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
            $name = true;
        } else {
            $name = false;

        }
//validar apellido
        if (!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)) {
            $lastname = true;
        } else {
            $lastname = false;

        }

//validar email
        if (!empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = true;
        } else {
            $email = false;

        }

//validar password
        if (!empty($password)) {
            $password = true;
        } else {
            $password = false;
        }

        return ([
            'name' => $name,
            'lastname'=> $lastname,
            'email' => $email,
            'pass' => $password
        ]);
    }


    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategorys(){
        require_once 'models/categories/category.php';
        $category = new Category();
        $categories = $category->getAll();
        return $categories;
    }

    public function validateProductCreate($name,$des,$price,$stock,$mimetype)
    {

        //validar nombre
        if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
            $name = true;
        } else {
            $name = false;

        }
//validar Descripcion
        if (!empty($des)) {
            $des = true;
        } else {
            $des = false;

        }
        //Validar Precio
        if (!empty($price) && is_numeric($price) && preg_match("/[0-9]/", $price)) {
            $price = true;
        } else {
            $price = false;
        }
//Validar stock
        if (!empty($stock) && is_numeric($stock) && preg_match("/[0-9]/", $stock)) {
            $stock = true;
        } else {
            $stock = false;
        }

        //validar imagen
        if ($mimetype == 'image/jpg' || $mimetype == 'image/png' || $mimetype == 'image/gif' || $mimetype == 'image/bpm' || $mimetype == 'image/jpeg' || $mimetype == 'image/webp') {
            $mimetype = true;
        }else{
            $mimetype = false;
        }

            return ([
            'name' => $name,
            'des'=> $des,
            'price' => $price,
            'stock' => $stock,
            'image' => $mimetype

        ]);
    }

    public static function dd($data){
        highlight_string("<?php\n " . var_export($data, true) . "?>");
        echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
        die();
    }
}
