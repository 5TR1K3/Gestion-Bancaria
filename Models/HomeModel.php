<?php
class HomeModel{
    private $con;
    public function __construct()
    {
        $this ->con = new mysqli('localhost','root','','bc_agricultua_sv');
    }
    
}

?>