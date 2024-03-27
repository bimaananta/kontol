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

    $inventories = query("SELECT alat_sekolah.nama_alat, kategori.nama, alat_sekolah.kode_alat, alat_sekolah.kondisi_alat, alat_sekolah.tgl_ditambahkan FROM alat_sekolah INNER JOIN kategori ON alat_sekolah.id_kategori = kategori.id;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo-sample.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Inventory</title>
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
    .active-picture{
        animation-name: pictureIn;
        animation-duration: .8s;
        animation-fill-mode: backwards;
        animation-timing-function: ease;
    }
    .main-text{
        animation-name: textIn;
        animation-duration: .8s;
        animation-fill-mode: forwards;
        animation-timing-function: ease;
    }

    @keyframes pictureIn {
        0%{
            opacity: 0;
            transform: translate(-100px,0px);
        }
        100%{
            opacity: 1;
            transform: translate(0px,0px);
        }
    }
    @keyframes textIn {
        0%{
            opacity: 0;
            transform: translate(100px,0px);
        }
        100%{
            opacity: 1;
            transform: translate(0px,0px);
        }
    }

    @keyframes pictureOut {
        0%{
            opacity: 1;
            transform: translate(0px,0px);
        }
        100%{
            opacity: 0;
            transform: translate(-100px,0px);
        }
    }
    @keyframes textOut {
        0%{
            opacity: 1;
            transform: translate(0px,0px);
        }
        100%{
            opacity: 0;
            transform: translate(100px,0px);
        }
    }

    .inactive-picture{
        animation-name: pictureOut;
        animation-duration: .8s;
        animation-fill-mode: forwards;
        animation-timing-function: ease;
    }
    .inactive-text{
        animation-name: textOut;
        animation-duration: .5s;
        animation-fill-mode: forwards;
        animation-timing-function: ease;
    }
</style>
<body class="flex flex-row relative">
    <div class="sidebar sidebar-non-active p-6 box-border shadow-md min-w-[300px] h-[100vh] bg-slate-800 text-white transition-all fixed left-0 md:static z-50" id="sidebar">
        <div class="header header-non-active flex flex-row items-center justify-between gap-3" id="header-sidebar">
            <i class="bi bi-buildings-fill" style="font-size: 20px;"></i>
            <h2 id="sideText" class="text-xl side-text-non-active">School Inventory</h2>
            <i class="bi bi-x-lg close-non-active" style="font-size: 20px; margin-left: 5px; cursor: pointer;" id="close"></i>
        </div>
        <div class="navigation mt-5 flex flex-col">
            <p id="sideText" class="side-text-non-active text-xs" style="color:#6a6a6a; font-weight: bold; letter-spacing: 2px;">MANAGEMENT</p>
            <a href="index.php" class="navbar home p-2 flex flex-row items-center gap-3 mt-3">
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
            <a href="inventory.php" class="navbar active study p-2 flex flex-row items-center gap-3 mt-2"">
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
    <div class="container overflow-x-hidden w-full h-screen relative flex flex-col">
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
        <div class="main flex-1 p-5 px-10">
            <div class="header mb-3 flex flex-row justify-between items-center">
                <div class="left-side">
                    <h1 class="text-3xl font-semibold">Inventory</h1>
                    <p class="text-slate-600">View and manage the inventory</p>
                </div>
                <div class="right-side flex flex-row items-center gap-3">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="w-[50px] h-[50px] rounded-full">
                    <div class="profile-detail">
                        <h1 class="text-lg font-semibold">Bima Ananta</h1>
                        <p class="text-slate-600">View Profile</p>
                    </div>
                </div>
            </div>
            <div class="w-full h-fit rounded-md p-3 mb-3 grid grid-cols-2 gap-2">
                <div class="sort-part flex flex-row items-center w-fit gap-3 col-span-2">
                    <i class="bi bi-card-list text-base"></i>
                    <p class="text-sm">Urut Berdasarkan :</p>
                    <select name="sort" id="sort" class="text-sm outline-none rounded-md p-1">
                        <option value="1">Tanggal dibuat (terbaru)</option>
                        <option value="1">Tanggal dibuat (terlama)</option>
                        <option value="1">Abjad</option>
                    </select>
                </div>
                <div class="search-part flex flex-row items-center w-full">
                    <div class="search-column flex-1 flex flex-row gap-3 border border-gray-300 rounded-l-md p-2 bg-white overflow-hidden">
                        <i class="bi bi-search text-base"></i>
                        <input type="text" name="search" id="search" class="outline-none text-sm" placeholder="Enter Search">
                    </div>
                    <button class="w-[80px] h-[40px] rounded-r-md text-white py-2 bg-blue-700 "><i class="bi bi-search"></i></button>
                </div>
                <div class="action w-full flex flex-row justify-end gap-2">
                    <a href="tambah.html" class="px-3 py-2 text-white rounded-md bg-green-600 text-sm flex items-center filter hover:brightness-95">+ Tambah Alat</a>
                    <a href="permintaan.html" class="px-3 py-2 text-white rounded-md bg-yellow-500 text-sm hover:brightness-95 flex flex-row gap-1 items-center"><i class="bi bi-exclamation-circle"></i> Permintaan</a>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Alat</th>
                        <th>Kategori</th>
                        <th>Kode Alat</th>
                        <th>Kondisi</th>
                        <th>Tanggal Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    <?php foreach($inventories as $inventory): ?>
                        <tr>
                            <td><?= $id++; ?></td>
                            <td><?= $inventory["nama_alat"]; ?></td>
                            <td><?= $inventory["nama"] ?></td>
                            <td><?= $inventory["kode_alat"] ?></td>
                            <td><?= $inventory["kondisi_alat"] ?></td>
                            <td><?= $inventory["tgl_ditambahkan"] ?></td>
                            <td class="flex flex-row gap-2">
                                <a href="edit.html" class="px-3 py-2 text-white rounded-md bg-blue-600">Edit</a>
                                <button class="px-3 py-2 text-white rounded-md bg-red-600">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="fixed bottom-0 -z-20" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,32L34.3,53.3C68.6,75,137,117,206,154.7C274.3,192,343,224,411,213.3C480,203,549,149,617,149.3C685.7,149,754,203,823,218.7C891.4,235,960,213,1029,192C1097.1,171,1166,149,1234,144C1302.9,139,1371,149,1406,154.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>