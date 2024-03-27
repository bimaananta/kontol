<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "db_inventory");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    function login($data, $table){
        global $conn;

        $username = $data["username"];
        $password = $data["password"];
        $rememberMe = (isset($data["remember"]) && $data["remember"] == "on");

        $result = mysqli_query($conn, "SELECT * FROM $table WHERE username = '$username';");

        if(!mysqli_num_rows($result)){
            return [
                "status" => false, 
                "message" => "Pengguna tidak ditemukan!"
            ];
        }

        $credentials = mysqli_fetch_assoc($result);

        if(!$credentials["is_accepted"]){
            return [
                "status" => false, 
                "message" => "Akun anda belum disetujui oleh admin!"
            ];;
        }
        
        if(!password_verify($password, $credentials["password"])){
            return [
                "status" => false, 
                "message" => "Password anda salah!"
            ];
        }

        $hashed_username = hash('sha256', $credentials["username"]);
        $_SESSION["login"] = true; 

        if($rememberMe){
            setcookie("id", $credentials["id"], time() + (3600 * 24 * 7), "/");
            setcookie("key", $hashed_username, time() + (3600 * 24 * 7), "/");
        }
        
        header("Location: index.php");
        exit;
    }

    function register($data){
        global $conn;

        $username = $data["username"];
        $email = $data["email"];
        $nama = $data["nama"];
        $password = $data["password"];
        $konfirmasi = $data["konfirmasi"];
        $nuptk = $data["nuptk"];
        $role = $data["role"] == "admin" ? "admin" : "user";

        if($password != $konfirmasi){
            return false;
        }
        
        $password = password_hash($data["password"], PASSWORD_DEFAULT);

        if($role == "admin"){
            $result = mysqli_query($conn, "SELECT * FROM $role WHERE username = '$username';");
            
            if(mysqli_num_rows($result)){
                return false;
            }

            $result = mysqli_query($conn, "INSERT INTO $role (username,password,nama,email,nuptk) VALUES ('$username','$password','$nama','$email','$nuptk');");

            if(!$result){
                return false;
            }

            return true;
        }

        else if($role == "user"){
            $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email';");
            
            if(mysqli_num_rows($result)){
                return false;
            }

            $result = mysqli_query($conn, "INSERT INTO $role (username,password,nama,email,nuptk) VALUES ('$username','$password','$nama','$email','$nuptk');");

            if(!$result){
                return false;
            }

            return true;
        }
    }

    function checkCookie(){
        global $conn;
        if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
            $id = $_COOKIE["id"];
            $key = $_COOKIE["key"];

            $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$id';");

            if(!$result){
                return false;
            }

            $credentials = mysqli_fetch_assoc($result);

            if(hash('sha256', $credentials["username"]) != $key){
                return false;
            }

            return true;
        }
    }

?>