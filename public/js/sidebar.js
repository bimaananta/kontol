const clsBtn = document.getElementById('close');
const sidebar = document.getElementById('sidebar');
const headerSidebar = document.getElementById('header-sidebar')
const sideText = document.querySelectorAll('#sideText')

clsBtn.addEventListener('click', function(){
    sidebar.classList.toggle('sidebar-non-active');
    headerSidebar.classList.toggle('header-non-active');
    sideText.forEach(function(element){
        element.classList.toggle('side-text-non-active');
    })
    clsBtn.classList.toggle('close-non-active');
});