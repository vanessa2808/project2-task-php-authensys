<?php
class connectDB {

    private $server = 'localhost';
    private $username = 'root';
    private $password = ''; // $password = '';
    private $database = 'project2';

    protected function connect() {
        // thuc hien ket noi database
        $connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);

        // utf-8 connect
        mysqli_set_charset($connect,"utf8");

        // kiem tra ket noi database
        if ($connect === FALSE) {
            echo "Connect fail ".mysqli_connect_error();
        }
        return $connect;
    }
}
?>