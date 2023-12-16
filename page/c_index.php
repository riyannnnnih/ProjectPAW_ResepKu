<?php
include_once './m_index.php';

class index
{
    private $model;

    public function __construct()
    {
        $this->model = new m_index();
    }

    public function login($email, $password)
    {
        $this->model->login($email, $password);
    }

    public function reg($username, $email, $foto, $password)
    {
        $this->model->reg($username, $email, $foto, $password);
    }

    public function invoke()
    {
        $resep = $this->model->fetchRandomResep();
        include "./v_index.php";
    }

    public function upload($new_file_path, $file) {
        if (isset($file['tmp_name']) && $file['tmp_name'] != '') {
            $image = getimagesize($file['tmp_name']);
            if (!$image) {
                return false;
            }
        } else {
            return false;
        }

        $upload_path = $new_file_path . basename($file['name']);

        if (rename($file['tmp_name'], $upload_path)) {
            return $upload_path;
        } else {
            return false;
        }
    }
}
