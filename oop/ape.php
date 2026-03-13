<?php
require_once "animal.php";

class Ape extends Animal {

    public $legs = 2;

    function yell(){
        echo "Auooo";
    }

}