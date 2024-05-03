<?php

class Assets {
    private $pismeno;

    public function __construct() {
        $pagename = basename($_SERVER["SCRIPT_NAME"], ".php");
        $this->pismeno = substr($pagename, 0, 1);
    }

    public function add_styles() {
        return '<link rel="stylesheet" href="css/style' . strtoupper($this->pismeno) . '.css"/>';
    }
    
    public function add_scripts() {
        return '<script type="text/javascript" src="js/script' . strtoupper($this->pismeno) . '.js"></script>';
    }
}
