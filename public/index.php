<?php
    session_start();

    require 'functions.php';

    if(checkCookie()){
        $_SESSION["login"] = true;
    }

    if(!isset($_SESSION["login"])){
        header("Location: intro.php");
        exit;
    }

    $dashboardStats = getDashboardStats();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Tailwind</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Montserrat:wght@200;300;500;600;700&family=Poppins:wght@200;400;500;600;700&display=swap');
    *{
        font-family: 'Poppins';
    }
    .circle{
        background-image: conic-gradient(rgb(22,163,74) 1deg 210deg, rgb(232, 232, 232) 210deg 360deg);
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
<body style="font-family: 'Montserrat', sans-serif;">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inventory Sekolah</title>
</head>
<body class="flex flex-row relative overflow-x-hidden overflow-y-auto">
    <div class="sidebar sidebar-non-active p-6 box-border shadow-md min-w-[300px] h-[100vh] bg-slate-800 text-white transition-all  z-50" id="sidebar">
        <div class="header header-non-active flex flex-row items-center justify-between gap-3" id="header-sidebar">
            <i class="bi bi-buildings-fill" style="font-size: 20px;"></i>
            <h2 id="sideText" class="text-xl side-text-non-active">School Inventory</h2>
            <i class="bi bi-x-lg close-non-active" style="font-size: 20px; margin-left: 5px; cursor: pointer;" id="close"></i>
        </div>
        <div class="navigation mt-5 flex flex-col">
            <p id="sideText" class="side-text-non-active text-xs" style="color:#6a6a6a; font-weight: bold; letter-spacing: 2px;">MANAGEMENT</p>
            <a href="index.php" class="navbar home p-2 active flex flex-row items-center gap-3 mt-3">
                <i class="bi bi-house-door-fill block transition-all ease-in-out hover:-rotate-[20deg] hover:scale-110" style="font-size: 20px;"></i>
                <p id="sideText" class="side-text-non-active text-sm">Dashboard</p>
            </a>
            <a href="kategori.php" class="navbar home p-2 flex flex-row items-center gap-3 mt-3">
                <i class="bi bi-collection block transition-all ease-in-out hover:-rotate-[20deg] hover:scale-110" style="font-size: 20px;"></i>
                <p id="sideText" class="side-text-non-active text-sm">Kategori</p>
            </a>
            <a href="pengguna.php" class="navbar todolist p-2 flex flex-row items-center gap-3 mt-3">
                <i class="bi bi-person-lines-fill block transition-all ease-in-out hover:-rotate-[20deg] hover:scale-110" style="font-size: 20px;"></i>
                <p id="sideText" class="side-text-non-active text-sm">Pengguna</p>
            </a>
            <a href="inventory.php" class="navbar study p-2 flex flex-row items-center gap-3 mt-2"">
                <i class="bi bi-boxes block transition-all duration-75 ease-in-out hover:-rotate-[20deg] hover:scale-110" style="font-size: 20px;"></i>
                <p id="sideText" class="side-text-non-active text-sm">Inventory</p>
            </a>
            <a href="permintaan.php" class="navbar image p-2 flex flex-row items-center gap-3 mt-2"">
                <i class="bi bi-file-text block transition-all ease-in-out hover:-rotate-[20deg] hover:scale-110" style="font-size: 20px;"></i>
                <p id="sideText" class="side-text-non-active text-sm">Permintaan</p>
            </a>
            <a href="laporan.php" class="navbar geography p-2 flex flex-row items-center gap-3 mt-2"">
                <i class="bi bi-envelope-exclamation-fill block transition-all ease-in-out hover:-rotate-[20deg] hover:scale-110" style="font-size: 20px;"></i>
                <p id="sideText" class="side-text-non-active text-sm">Laporan</p>
            </a>
            <a href="history.php" class="navbar geography p-2 flex flex-row items-center gap-3 mt-2"">
                <i class="bi bi-journals block transition-all ease-in-out hover:-rotate-[20deg] hover:scale-110" style="font-size: 20px;"></i>
                <p id="sideText" class="side-text-non-active text-sm">History</p>
            </a>
        </div>
    </div>
    <div class="container overflow-x-hidden min-w-full h-fit relative flex flex-col">
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
        <div class="main p-5 px-10 w-[90%]">
            <div class="header flex flex-row flex-wrap gap-3 justify-between">
                <div class="header-text">
                    <p class="font-normal text-lg text-slate-400">DASHBOARD</p>
                    <h1 class="font-normal text-3xl text-slate-700">Halo <span class="font-bold text-slate-900">Bima Ananta</span>✋</h1>
                </div>
                <div class="profile flex flex-row items-center gap-4">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="" class="w-[50px] h-[50px] rounded-full">
                    <div class="text flex flex-col">
                        <h3 class="font-semibold text-base">Bima Ananta</h3>
                        <a href="#" class="text-xs">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="stats mt-5 flex flex-wrap gap-4 w-full">
                <div class="dashboard-info total-barang flex-1 min-w-[200px] h-[150px] bg-blue-500 rounded flex flex-row justify-end items-center p-5 gap-5 shadow-lg relative overflow-hidden">
                    <i class="bi bi-box-seam dashboard text-8xl text-slate-900 opacity-25 absolute -bottom-3 left-0 block -rotate-6 scale-150"></i>
                    <div class="text z-10">
                        <h1 class="text-white font-semibold text-3xl"><?= $dashboardStats["total_alat"] ?></h1>
                        <h1 class="text-white font-semibold text-sm">Total Barang</h1>
                    </div>
                </div>
                <div class="dashboard-info kategori-barang flex-1 min-w-[200px] h-[150px] bg-yellow-600 rounded flex flex-row justify-end items-center p-5 gap-5 shadow-lg relative overflow-hidden">
                    <i class="bi bi-folder dashboard text-8xl text-slate-900 opacity-25 absolute -bottom-1 left-0 block -rotate-6 scale-150"></i>
                    <div class="text z-10">
                        <h1 class="text-white font-semibold text-3xl"><?= $dashboardStats["total_kategori"] ?></h1>
                        <h1 class="text-white font-semibold text-sm">Kategori Barang</h1>
                    </div>
                </div>
                <div class="dashboard-info barang-masuk flex-1 min-w-[200px] h-[150px] bg-green-600 rounded flex flex-row justify-end items-center p-5 gap-5 shadow-lg relative overflow-hidden">
                    <i class="bi bi-bag-plus dashboard text-8xl text-slate-900 opacity-25 absolute -bottom-1 left-0 block -rotate-6 scale-150"></i>
                    <div class="text z-10">
                        <h1 class="text-white font-semibold text-3xl"><?= $dashboardStats["barang_masuk"] ?></h1>
                        <h1 class="text-white font-semibold text-sm">Barang Masuk</h1>
                    </div>
                </div>
                <div class="dashboard-info barang-keluar flex-1 min-w-[200px] h-[150px] bg-red-500 rounded flex flex-row justify-end items-center p-5 gap-5 shadow-lg relative overflow-hidden">
                    <i class="bi bi-clipboard2-minus dashboard text-8xl text-slate-900 opacity-25 absolute -bottom-1 left-0 block -rotate-6 scale-150"></i>
                    <div class="text z-10">
                        <h1 class="text-white font-semibold text-3xl"><?= $dashboardStats["barang_keluar"] ?></h1>
                        <h1 class="text-white font-semibold text-sm">Barang Keluar</h1>
                    </div>
                </div>
            </div>
                <div class="percentage mt-5 flex flex-row flex-wrap gap-4">
                    <div class="box w-[400px] h-[230px] p-5 bg-white z-10 shadow-lg rounded">
                        <h2 class="font-semibold text-base text-slate-900">Statistik Barang</h2>
                        <div class="w-full h-[2px] bg-blue-900 rounded-full mt-1"></div>
                        <div class="detail mt-5 flex flex-row justify-between items-center">
                            <div class="main-percentage">
                                <ul class="text-xs flex flex-col gap-2">
                                    <li>Barang Masuk : 12</li>
                                    <li>Barang Keluar : 11</li>
                                    <li>Barang/hari : 0,5/hari</li>
                                    <li>Barang Masuk/Keluar : 1/0</li>
                                </ul>
                                <a href="#" class="block bg-blue-600 px-6 py-2 rounded-full text-xs text-white mt-3 w-fit">Detail</a>
                            </div>
                            <div class="circle w-[100px] h-[100px] rounded-full z-20 flex justify-center items-center mr-8">
                                <div class="circle-inner w-[70px] h-[70px] bg-white rounded-full flex justify-center items-center">
                                    <p class="z-30">68%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-status w-full lg:w-fit flex-1 h-[230px] bg-white shadow-lg z-10 rounded overflow-hidden">
                        <table class="w-full h-[230px] text-sm">
                            <thead class="text-white">
                                <tr>
                                    <th class="bg-blue-800 p-3 text-sm text-left w-full">Profile Status</th>
                                    <th class="bg-blue-800"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="p-3">
                                    <td class="p-2">Status</td>
                                    <td class="p-2">Admin</td>
                                </tr>
                                <tr>
                                    <td class="p-2">Email</td>
                                    <td class="p-2">albaihaqibimaananta@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="p-2">Terakhir Log-In</td>
                                    <td class="p-2">02-11-2024</td>
                                </tr>
                                <tr>
                                    <td class="p-2">No. Telp</td>
                                    <td class="p-2">0817-8143-1632</td>
                                </tr>
                                <tr>
                                    <td class="p-2">Aksi</td>
                                    <td class="p-2"><a href="#" class="px-3 py-2 bg-red-600 text-xs text-white rounded">Log-Out</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            
        </div>
        <!-- <div class="bg-blue-800 w-full h-[150px] absolute bottom-0"></div> -->
        <svg xmlns="http://www.w3.org/2000/svg" class="fixed bottom-0 -z-20 w-full" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,32L34.3,53.3C68.6,75,137,117,206,154.7C274.3,192,343,224,411,213.3C480,203,549,149,617,149.3C685.7,149,754,203,823,218.7C891.4,235,960,213,1029,192C1097.1,171,1166,149,1234,144C1302.9,139,1371,149,1406,154.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>