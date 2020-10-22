


document.addEventListener("DOMContentLoaded", function () {
    let mainMenu = document.querySelector(".menu-main-menu")
    let openButton = document.querySelector(".menu-toggle");

    openButton.addEventListener("click", () => openMenu());
        function openMenu() {
        console.log('hello from js');

        // openButton.classList.toggle("fa-bars")
        // openButton.classList.toggle("fa-times")
        // header.classList.toggle("header-menu-active")
    }


    // later! resize toggling too
    //scroll to top?

    
});
