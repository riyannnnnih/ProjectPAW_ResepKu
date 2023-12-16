<?php
include_once "./m_index.php";

class index {
    private $model;

    public function __construct(){
        $this->model = new m_index();
    }

    public function invoke(){
        $resep = $this->model->fetchRandomResep();
        include "v_index.php";
    }
}
