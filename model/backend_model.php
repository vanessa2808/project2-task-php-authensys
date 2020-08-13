<?php
include 'config/connectDB.php';

class Model extends ConnectDB {
    // Check login
    public function checkLogin($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $listUser = mysqli_query($this->connect(), $sql);
        return $listUser;
    }
    function addUsers($username, $password, $avatar) {
        $sql = "INSERT INTO users(name, password, avatar) VALUES ('$username', '$password','$avatar')";
        return mysqli_query($this->connect(), $sql);
    }

    public function listUsers() {
        $sql = "SELECT * FROM users";
        $listUsers  = mysqli_query($this->connect(), $sql);
        return $listUsers;
    }
    public function getUsers($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($this->connect(), $sql);
        return $result->fetch_assoc();
    }
    public function deleteUsers($id){
        $sql = "DELETE FROM users WHERE id = $id";
        return mysqli_query($this->connect(),$sql);
    }
    public function editUsers($id, $username, $password, $avatar){
        $sql = "UPDATE users SET username = '$username', password = '$password',avatar = '$avatar' WHERE id = $id";
        return mysqli_query($this->connect(),$sql);
    }



}
?>
