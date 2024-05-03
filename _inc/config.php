<?php

$GLOBALS["DATABASE"] = array(
    "HOST" => "localhost",
    "PORT" => 3306,
    "DBNAME" => "projekt",
    "USER" => "root",
    "PASSWORD" => ""
);

require_once "_inc/classes/Database.php";

require_once "_inc/classes/Assets.php";
require_once "_inc/classes/Contact.php";
require_once "_inc/classes/User.php";
require_once "_inc/classes/Article.php";

session_start();
