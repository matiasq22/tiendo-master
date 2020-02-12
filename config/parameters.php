<?php
$url =  getenv('BASE_URL') ? getenv('BASE_URL') : 'http:/localhost/';
define("base_url", $url);
define("controller_default","ProductsController");
define("action_default","index");