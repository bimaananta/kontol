<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
    @keyframes leftAndRight {
        0%{
            transform: translate(0px, 0px);
        }
        50%{
            transform: translate(3px, 0px);
        }
        100%{
            transform: translate(0px, 0px);
        }
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
            <a href="kategori.php" class="navbar active home p-2 flex flex-row items-center gap-3 mt-3">
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
            <div class="header mb-3 flex flex-row flex-wrap justify-between items-center gap-3">
                <div class="left-side min-w-fit">
                    <h1 class="text-3xl font-semibold">Kategori</h1>
                    <p class="text-slate-600">Lihat dan kelola kategori barang inevntaris</p>
                </div>
                <div class="right-side flex flex-row items-center gap-3">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="w-[50px] h-[50px] rounded-full">
                    <div class="profile-detail">
                        <h1 class="text-base font-semibold">Bima Ananta</h1>
                        <p class="text-sm text-slate-600">View Profile</p>
                    </div>
                </div>
            </div>
            <div class="kategori-collection grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mt-5">
                <div class="kategori-card w-full h-fit bg-red-600 p-5 rounded relative border border-slate-300 shadow-md">
                    <h1 class="text-white text-lg font-medium z-10">Fasilitas Kelas</h1>
                    <i class="bi bi-door-open block text-4xl text-white mt-3 text-[100px]"></i>
                    <a href="#" class="text-white mt-5 block hover:animate-[leftAndRight_0.5s_ease-in-out_infinite_forwards]">Lihat Selengkapnya >></a>
                </div>
                <div class="kategori-card w-full h-fit bg-blue-600 p-5 rounded relative border border-slate-300 shadow-md">
                    <h1 class="text-white text-lg font-medium z-10">Fasilitas Sekolah</h1>
                    <i class="bi bi-bank2 block text-4xl text-white mt-3 text-[100px]"></i>
                    <a href="#" class="text-white mt-5 block hover:animate-[leftAndRight_0.5s_ease-in-out_infinite_forwards]">Lihat Selengkapnya >></a>
                </div>
                <div class="kategori-card w-full h-fit bg-green-600 p-5 rounded relative border border-slate-300 shadow-md">
                    <h1 class="text-white text-lg font-medium z-10">Alat Tulis</h1>
                    <i class="bi bi-pencil block text-4xl text-white mt-3 text-[100px]"></i>
                    <a href="#" class="text-white mt-5 block hover:animate-[leftAndRight_0.5s_ease-in-out_infinite_forwards]">Lihat Selengkapnya >></a>
                </div>
                <div class="kategori-card w-full h-fit bg-yellow-500 p-5 rounded relative border border-slate-300 shadow-md">
                    <h1 class="text-white text-lg font-medium z-10">Kebersihan</h1>
                    <i class="bi bi-tools block text-4xl text-white mt-3 text-[100px]"></i>
                    <a href="#" class="text-white mt-5 block hover:animate-[leftAndRight_0.5s_ease-in-out_infinite_forwards]">Lihat Selengkapnya >></a>
                </div>
            </div>
            <div class="w-full h-fit rounded-md mt-5 mb-3 grid grid-cols-2 gap-2">
                <div class="sort-part flex flex-row items-center w-1/2 gap-3 col-span-2 bg-white rounded-md p-3 box-border border border-slate-300 shadow-md">
                    <i class="bi bi-card-list text-base"></i>
                    <p class="text-sm">Urut Berdasarkan :</p>
                    <select name="sort" id="sort" class="text-sm outline-none rounded-md p-1">
                        <option value="1">Tanggal dibuat (terbaru)</option>
                        <option value="1">Tanggal dibuat (terlama)</option>
                        <option value="1">Abjad</option>
                    </select>
                </div>
                <div class="search-part flex flex-row items-center w-full rounded-md shadow-md overflow-hidden">
                    <div class="search-column flex-1 flex flex-row gap-3 border border-slate-300 rounded-l-md p-2 bg-white overflow-hidden">
                        <i class="bi bi-search text-base"></i>
                        <input type="text" name="search" id="search" class="outline-none text-sm" placeholder="Enter Search">
                    </div>
                    <button class="w-[80px] h-[40px] rounded-r-md text-white py-2 bg-blue-700 "><i class="bi bi-search"></i></button>
                </div>
                <div class="action w-full flex flex-row justify-end gap-2">
                    <a href="inventory.html" class="px-3 py-2 text-white rounded-md bg-green-600 text-sm shadow-md flex items-center gap-1"><i class="bi bi-eye"></i> Lihat Alat</a>
                    <button onclick="modalToggle()" class="px-3 py-2 text-white rounded-md bg-yellow-600 text-sm shadow-md"><i class="bi bi-exclamation-circle"></i> Informasi</button>
                </div>
            </div>
            <table class="shadow-md">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Fasilitas Sekolah</td>
                        <td class="flex flex-row gap-2">
                            <button class="px-3 py-2 text-white rounded-md bg-green-600">Detail</button>
                            <button class="px-3 py-2 text-white rounded-md bg-red-600">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Fasilitas</td>
                        <td class="flex flex-row gap-2">
                            <button class="px-3 py-2 text-white rounded-md bg-green-600">Detail</button>
                            <button class="px-3 py-2 text-white rounded-md bg-red-600">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="fixed bottom-0 -z-20" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,32L34.3,53.3C68.6,75,137,117,206,154.7C274.3,192,343,224,411,213.3C480,203,549,149,617,149.3C685.7,149,754,203,823,218.7C891.4,235,960,213,1029,192C1097.1,171,1166,149,1234,144C1302.9,139,1371,149,1406,154.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>
    <div class="information-modal w-full h-full absolute top-0 left-0 z-50 bg-black bg-opacity-50 flex hidden items-center justify-center">
        <div class="main-modal w-1/2 h-fit relative bg-white rounded-md overflow-hidden">
            <div class="p-5 box-border">
                <i class="bi bi-x absolute top-1 right-2 text-4xl cursor-pointer text-slate-600" onclick="modalToggle()"></i>
                <h1 class="text-3xl font-semibold mb-3">Kategori</h1>
                <p class="text-slate-600">Kategori alat pada website ini bersifat statis dan tidak dapat diubah. Jika diubah atau dihapus, maka juga akan turut serta menghapus barang dan alat dengan kategori terkait</p>
                <button class="px-3 py-2 rounded-md bg-green-600 text-white text-sm mt-5" onclick="modalToggle()">Mengerti</button>
            </div>
            <div class="w-full h-[5px] bg-blue-600 absolute bottom-0"></div>
        </div>
    </div>
    <script src="js/sidebar.js"></script>
    <script>
        const modal = document.querySelector('.information-modal');
        
        function modalToggle(){
            modal.classList.toggle('hidden');
        }
    </script>
</body>
</html>