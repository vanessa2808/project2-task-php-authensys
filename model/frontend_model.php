<?php
include 'config/connectDB.php';
class Model extends ConnectDB{

    function register($name, $password, $role_id, $address, $email) {
        $checkUserExist = $this->checkUserExist($email);
        $role_id =1;
        if ($checkUserExist->num_rows == 0) {
            $sql = "INSERT INTO users(name, password, role_id, address, email) VALUES('$name', '$password', '$role_id', '$address', '$email')";
            return mysqli_query($this->connect(), $sql);
        }

        return false;
    }

    function login($email, $password) {

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        return mysqli_query($this->connect(), $sql);

    }

    function checkUserExist($email) {

        $sql = "SELECT * FROM users WHERE email = '$email'";
        return mysqli_query($this->connect(), $sql);

    }
    function getUserID($email) {
        $sql = "SELECT id FROM users WHERE email = '$email'";
        return mysqli_query($this->connect(), $sql);
    }


}
?>
