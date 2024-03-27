<?php
    require 'functions.php';

    if(isset($_POST["submit"])){
        $login = login($_POST, "admin");
        if(!$login["status"]){
            $error = true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
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
</style>
<body class="overflow-hidden">
    <div class="container w-full h-screen flex items-center justify-center">
        <div class="background absolute w-full h-screen -z-20">
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
        <div class="main-content w-1/3 h-[400px] bg-white z-30 rounded-lg shadow-md flex flex-col items-center p-5 box-border">
            <h1 class="font-semibold text-xl">Selamat Datang!</h1>
            <p class="font-normal text-xs text-slate-500 mb-2">Masuk untuk melanjutkan</p>
            <form action="" method="post" class="w-full flex flex-col">
                <div class="mb-5 w-full">
                    <label for="username" class="text-xs text-slate-500">Username</label>
                    <div class="input flex flex-row items-center border border-slate-400 p-1 px-2 box-border rounded-md">
                        <i class="bi bi-person-circle text-xl text-slate-500"></i>
                        <input type="text" name="username" id="username" class="bg-transparent text-xs block w-full outline-none p-2 box-border " placeholder="Enter Your Username">
                    </div>
                </div>
                <div class="mb-3 w-full">
                    <label for="password" class="text-xs text-slate-500">Password</label>
                    <div class="input flex flex-row items-center border border-slate-400 p-1 px-2 box-border rounded-md">
                        <i class="bi bi-exclamation-circle text-xl text-slate-500"></i>
                        <input type="password" name="password" id="password" class="bg-transparent text-xs block w-full outline-none p-2 box-border " placeholder="Enter Your Username">
                    </div>
                </div>
                <div class="action flex flex-row justify-between mb-4">
                    <div class="remember flex flex-row gap-2 items-center">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="text-xs">Remember Me</label>
                    </div>
                    <a href="#" class="text-xs text-blue-400">Forgot Password ?</a>
                </div>
                <button type="submit" name="submit" class="block text-white bg-blue-600 w-full p-2 rounded-lg mt-5 hover:-translate-y-1 transition-all">Masuk</button>
                <p class="text-xs mt-3 mx-auto">Tidak punya akun ? <a href="register.php" class="text-blue-400">Buat Akun</a></p>
                <?php if(isset($error)) : ?>
                    <p class="text-center text-red-600 text-sm mt-2" style="color: red;"><?= $login["message"]; ?></p>
                <?php endif; ?>
            </form>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="fixed bottom-0 -z-20" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,32L34.3,53.3C68.6,75,137,117,206,154.7C274.3,192,343,224,411,213.3C480,203,549,149,617,149.3C685.7,149,754,203,823,218.7C891.4,235,960,213,1029,192C1097.1,171,1166,149,1234,144C1302.9,139,1371,149,1406,154.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>
</body>
</html>