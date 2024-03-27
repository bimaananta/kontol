<?php
    require 'functions.php';

    if(isset($_POST["submit"])){
        $registSuccess = register($_POST);
        if($registSuccess){
            echo 
            "<script>
                alert('Akun anda tidak secara otomatis dibuat, melainkan menunggu konfirmasi dari admin, untuk mempercepat, anda dapat menghubungi admin aktif SMKN 2 Jakarta'); 
                window.location.href = 'intro.php'
            </script>";
        }else{
            $error = true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Register</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Montserrat:wght@200;300;500;600;700&family=Poppins:wght@200;400;500;600;700&display=swap');
    *{
        font-family: 'Poppins';
    }
    @keyframes moveY {
        0%{
            transform: translate(0px,0px);
        }
        100%{
            transform: translate(300px,0px);
        }
    }
    body{
        overflow-x: hidden;
    }
</style>
<body>
    <div class="container min-w-full h-screen flex justify-center items-center">
        <div class="background absolute w-full h-screen -z-10">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#F2F4F8" d="M58.8,-30C72,-11.1,75.5,17.3,64.1,37.3C52.7,57.4,26.4,69.2,-0.6,69.5C-27.5,69.8,-55,58.7,-62.4,41C-69.8,23.3,-57,-1.1,-43.3,-20.4C-29.5,-39.6,-14.7,-53.7,4,-56C22.8,-58.3,45.6,-48.9,58.8,-30Z" transform="translate(100 100)" />
            </svg>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#F2F4F8" d="M58.8,-30C72,-11.1,75.5,17.3,64.1,37.3C52.7,57.4,26.4,69.2,-0.6,69.5C-27.5,69.8,-55,58.7,-62.4,41C-69.8,23.3,-57,-1.1,-43.3,-20.4C-29.5,-39.6,-14.7,-53.7,4,-56C22.8,-58.3,45.6,-48.9,58.8,-30Z" transform="translate(100 100)" />
            </svg>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#F2F4F8" d="M58.8,-30C72,-11.1,75.5,17.3,64.1,37.3C52.7,57.4,26.4,69.2,-0.6,69.5C-27.5,69.8,-55,58.7,-62.4,41C-69.8,23.3,-57,-1.1,-43.3,-20.4C-29.5,-39.6,-14.7,-53.7,4,-56C22.8,-58.3,45.6,-48.9,58.8,-30Z" transform="translate(100 100)" />
            </svg>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#F2F4F8" d="M58.8,-30C72,-11.1,75.5,17.3,64.1,37.3C52.7,57.4,26.4,69.2,-0.6,69.5C-27.5,69.8,-55,58.7,-62.4,41C-69.8,23.3,-57,-1.1,-43.3,-20.4C-29.5,-39.6,-14.7,-53.7,4,-56C22.8,-58.3,45.6,-48.9,58.8,-30Z" transform="translate(100 100)" />
            </svg>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#F2F4F8" d="M58.8,-30C72,-11.1,75.5,17.3,64.1,37.3C52.7,57.4,26.4,69.2,-0.6,69.5C-27.5,69.8,-55,58.7,-62.4,41C-69.8,23.3,-57,-1.1,-43.3,-20.4C-29.5,-39.6,-14.7,-53.7,4,-56C22.8,-58.3,45.6,-48.9,58.8,-30Z" transform="translate(100 100)" />
            </svg>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#F2F4F8" d="M58.8,-30C72,-11.1,75.5,17.3,64.1,37.3C52.7,57.4,26.4,69.2,-0.6,69.5C-27.5,69.8,-55,58.7,-62.4,41C-69.8,23.3,-57,-1.1,-43.3,-20.4C-29.5,-39.6,-14.7,-53.7,4,-56C22.8,-58.3,45.6,-48.9,58.8,-30Z" transform="translate(100 100)" />
            </svg>
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#F2F4F8" d="M58.8,-30C72,-11.1,75.5,17.3,64.1,37.3C52.7,57.4,26.4,69.2,-0.6,69.5C-27.5,69.8,-55,58.7,-62.4,41C-69.8,23.3,-57,-1.1,-43.3,-20.4C-29.5,-39.6,-14.7,-53.7,4,-56C22.8,-58.3,45.6,-48.9,58.8,-30Z" transform="translate(100 100)" />
            </svg>
        </div>
        <div class="main-content shadow rounded-lg bg-white w-[60%] h-fit p-3">
            <h1 class="text-2xl font-semibold">Register</h1>
            <p class="text-sm text-slate-500">Isi data diri anda dibawah ini</p>
            <form action="" method="post" class="flex flex-col">
                <div class="w-full mt-3 flex flex-row flex-wrap gap-3">
                    <div class="flex-1">
                        <div class="mb-3 flex flex-col">
                            <label for="username" class="text-sm text-slate-500">Username</label>
                            <div class="input flex flex-row p-2 border gap-1 border-slate-400 rounded-md mt-2">
                                <i class="bi bi-person-circle text-slate-500"></i>
                                <input class="outline-none flex-1 text-sm" type="text" name="username" id="username" placeholder="Enter Username">
                            </div>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="email" class="text-sm text-slate-500">Email</label>
                            <div class="input flex flex-row p-2 border gap-1 border-slate-400 rounded-md mt-2">
                                <i class="bi bi-envelope text-slate-500"></i>
                                <input class="outline-none flex-1 text-sm" type="text" name="email" id="email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="nama" class="text-sm text-slate-500">Nama</label>
                            <div class="input flex flex-row p-2 border gap-1 border-slate-400 rounded-md mt-2">
                                <i class="bi bi-people text-slate-500"></i>
                                <input class="outline-none flex-1 text-sm" type="text" name="nama" id="nama" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="password" class="text-sm text-slate-500">Password</label>
                            <div class="input flex flex-row p-2 border gap-1 border-slate-400 rounded-md mt-2">
                                <i class="bi bi-exclamation-circle text-slate-500"></i>
                                <input class="outline-none flex-1 text-sm" type="password" name="password" id="password" placeholder="Enter Password">
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="mb-3 flex flex-col">
                            <label for="konfirmasi" class="text-sm text-slate-500">Konfirmasi Password</label>
                            <div class="input flex flex-row p-2 border gap-1 border-slate-400 rounded-md mt-2">
                                <i class="bi bi-exclamation-circle text-slate-500"></i>
                                <input class="outline-none flex-1 text-sm" type="password" name="konfirmasi" id="konfirmasi" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="nuptk" class="text-sm text-slate-500">NUPTK</label>
                            <div class="input flex flex-row p-2 border gap-1 border-slate-400 rounded-md mt-2">
                                <i class="bi bi-bank2 text-slate-500"></i>
                                <input class="outline-none flex-1 text-sm" type="text" name="nuptk" id="nuptk" placeholder="Enter NUPTK">
                            </div>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <h3 class="text-sm mb-2">Role</h3>
                            <div class="choice flex items-center gap-2">
                                <input type="radio" name="role" id="admin" value="admin">
                                <label for="admin" class="text-sm">Admin</label>
                            </div>
                            <div class="choice flex items-center gap-2">
                                <input type="radio" name="role" id="pengguna" value="pengguna">
                                <label for="pengguna" class="text-sm">Pengguna</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 mt-2">
                    <button type="submit" name="submit" class="px-3 text-sm py-2 bg-blue-600 text-white rounded-md">Daftar</button>
                    <button type="reset" class="px-3 text-sm py-2 bg-red-600 text-white rounded-md">Reset</button>
                </div>
            </form>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="fixed bottom-0 -z-20" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,32L34.3,53.3C68.6,75,137,117,206,154.7C274.3,192,343,224,411,213.3C480,203,549,149,617,149.3C685.7,149,754,203,823,218.7C891.4,235,960,213,1029,192C1097.1,171,1166,149,1234,144C1302.9,139,1371,149,1406,154.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>
</body>
</html>