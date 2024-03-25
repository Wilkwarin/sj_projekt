<?php
function add_styles() {
    $pagename = basename($_SERVER["SCRIPT_NAME"], ".php");
    $pismeno = substr($pagename, 0, 1);
    echo '<link rel="stylesheet" href="css/style' . strtoupper($pismeno) . '.css"/>';
}

function add_scripts() {
    $pagename = basename($_SERVER["SCRIPT_NAME"], ".php");
    $pismeno = substr($pagename, 0, 1);
    echo '<script type="text/javascript" src="js/script' . strtoupper($pismeno) . '.js"></script>';
}
?>