<?php 
class database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "lsp_perpus";

    public function connect(){
        return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }
}
?>