<?php
class Database {
    private $host = "localhost";
    private $username = "username";
    private $password = "password";
    private $database = "nama_database";

    protected $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

//Tips
class TipsModel {
    private $database; 

    public function __construct($database) {
        $this->database = $database;
    }

    public function addTip($judul, $langkah1, $langkah2, $gambarPath) {
        
        $sql = "INSERT INTO tips (judul, langkah1, langkah2, gambar_path) VALUES ('$judul', '$langkah1', '$langkah2', '$gambarPath')";
        $result = $this->database->query($sql);

        return $result;
    }

    public function getAllTips() {
        $sql = "SELECT * FROM tips";
        $result = $this->database->query($sql);

        // Mengembalikan hasil dalam bentuk array
        $tips = [];
        while ($row = $result->fetch_assoc()) {
            $tips[] = $row;
        }

        return $tips;
    }

    public function updateTip($tipId, $newJudul, $newLangkah1, $newLangkah2, $newGambarPath) {
        $sql = "UPDATE tips SET judul='$newJudul', langkah1='$newLangkah1', langkah2='$newLangkah2', gambar_path='$newGambarPath' WHERE id=$tipId";
        $result = $this->database->query($sql);

        return $result;
    }

    public function deleteTip($tipId) {
    
        $sql = "DELETE FROM tips WHERE id=$tipId";
        $result = $this->database->query($sql);

        return $result;
    }
}

//Komentar
class CommentModel {
    private $database; 
    public function __construct($database) {
        $this->database = $database;
    }

    public function addComment($comment) {
        $sql = "INSERT INTO comments (comment_text) VALUES ('$comment')";
        $result = $this->database->query($sql);

        return $result;
    }

    public function getAllComments() {
        $sql = "SELECT * FROM comments";
        $result = $this->database->query($sql);

        $comments = [];
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }

        return $comments;
    }

    public function updateComment($commentId, $newComment) {
        $sql = "UPDATE comments SET comment_text='$newComment' WHERE id=$commentId";
        $result = $this->database->query($sql);

        return $result;
    }

   
    public function deleteComment($commentId) {
        $sql = "DELETE FROM comments WHERE id=$commentId";
        $result = $this->database->query($sql);

        return $result;
    }
}


?>
