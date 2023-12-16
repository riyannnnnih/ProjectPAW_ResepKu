<?php
include_once "../connection.php";

class m_index {

    public function __construct() {

    }

    public function fetchRandomResep() {
        require "../connection.php";
        $resep = array();

        $result = $db->query("SELECT * FROM resep ORDER BY RAND() LIMIT 1");

        if($result->num_rows > 0){
            // Check data of each row
            while($row = $result->fetch_assoc()){
                $resep[] = $row;
            }
        } else {
            $resep = null;
        }
        return $resep;
    }
}