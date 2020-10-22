document.addEventListener("DOMContentLoaded", function () {
    let openButton = document.querySelector(".menu-toggle");

    openButton.addEventListener("click", () => toggleMenu());
        function toggleMenu() {
        document.querySelector("body").classList.toggle("smallscreen-menu-open");
        if (openButton.innerHTML!="close"){
            openButton.innerHTML = "close";
        }else openButton.innerHTML = "content(s)"
    }
window.addEventListener("resize", function(){
    if (window.innerWidth>540){
        openButton.innerHTML = "content(s)";
        document.querySelector("body").classList.remove("smallscreen-menu-open");
    }
    
})

    //later:
    //scroll to top of page when closing menu??

    
});