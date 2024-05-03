<?php
include_once "_inc/config.php";

session_destroy();
header("Location: prihlasenie.php");
die();
