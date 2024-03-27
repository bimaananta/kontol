<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>School Inventory</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Montserrat:wght@200;300;500;600;700&family=Poppins:wght@200;400;500;600;700&display=swap');
    *{
        margin: 0;
        padding: 0;
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
<body class="overflow-hidden">
    <div class="container min-w-full h-screen  flex items-center">
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
        <div class="main-content w-full flex flex-row items-center px-11 gap-10 ">
            <div class="picture w-[500px] h-fit block" id="picture">
                <img src="img/logo-sample.svg" alt="" class="w-[500px] active-picture">
            </div>
            <div class="main-text">
                <div class="header">
                    <h1 class="text-4xl font-bold">Welcome To School Inventory</h1>
                    <h3 class="text-xl font-semibold text-slate-500">SMK Negeri 2 Jakarta</h3>
                </div>
                <p class="w-[400px] h-fit mt-3">Sistem pergudangan digital berbasis website dalam rangka automasi skema manajemen pendidikan</p>
                <div class="action mt-5 flex flex-row gap-3">
                    <a href="#" data-target="login-user.php" class="px-3 py-3 text-xs font-semibold bg-blue-600 rounded-md text-white block w-fit hover:-translate-y-1 transition-all" id="loginBtn">Masuk Sebagai User</a>
                    <a href="#" data-target="login-admin.php" class="px-3 py-3 text-xs font-semibold bg-red-600 rounded-md text-white block w-fit hover:-translate-y-1 transition-all" id="loginBtn">Masuk Sebagai Admin</a>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="fixed bottom-0 -z-20" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,32L34.3,53.3C68.6,75,137,117,206,154.7C274.3,192,343,224,411,213.3C480,203,549,149,617,149.3C685.7,149,754,203,823,218.7C891.4,235,960,213,1029,192C1097.1,171,1166,149,1234,144C1302.9,139,1371,149,1406,154.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </div>

    <script>
        const loginBtns = document.querySelectorAll('#loginBtn');
        const picture = document.getElementById('picture');
        const text = document.querySelector('.main-text');

        loginBtns.forEach((loginBtn) => {
            loginBtn.addEventListener('click', function(e){
                e.preventDefault();
                picture.addEventListener('animationend', function () {
                    picture.classList.remove('active-picture');
                });

                text.classList.add('inactive-text');
                picture.classList.add('inactive-picture');

                let currentUrl = loginBtn.dataset.target;

                setTimeout(() => {
                    window.location.href = currentUrl;
                }, 500);
            });
        })
    </script>
</body>
</html>