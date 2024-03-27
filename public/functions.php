<?php
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

    function getDashboardStats(){
        global $conn;
        $total_alat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM alat_sekolah;"));
        $jumlah_kategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori;"));
        
        // kode tambahan buat data dashboard 
        $bulan_terkini = date("m");
        $alat_sekolah = query("SELECT * FROM alat_sekolah;");
        $counter_masuk = 0;
        $counter_keluar = 0;

        foreach($alat_sekolah as $alat){
            $bulan_tambah_alat = explode("-",explode(" ", $alat["tgl_ditambahkan"])[0])[1];
            $bulan_penukaran_alat = explode("-",explode(" ", $alat["tgl_ditambahkan"])[0])[1];

            if($alat["tgl_ditambahkan"] != $alat["tgl_dimodifikasi"] &&
                $bulan_penukaran_alat == $bulan_tambah_alat){
                    $counter_keluar++;
            }

            if($bulan_tambah_alat == $bulan_terkini){
                $counter_masuk++;
            }
        }

        return [
            "total_alat" => $total_alat,
            "total_kategori" => $jumlah_kategori,
            "barang_masuk" => $counter_masuk,
            "barang_keluar" => $counter_keluar,
        ];

    }

?>