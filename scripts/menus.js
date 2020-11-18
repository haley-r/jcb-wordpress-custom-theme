document.addEventListener("DOMContentLoaded", function () {
    let openButton = document.querySelector(".menu-toggle");
    //use the button to designate menu open or not
    openButton.addEventListener("click", () => toggleMenu());
        function toggleMenu() {
            window.scrollTo(0, 0);
            document.querySelector("body").classList.toggle("smallscreen-menu-open");
            if(openButton.innerHTML!="close menu"){
                openButton.innerHTML = "close menu";
            }else{
                openButton.innerHTML = "content(s)";
            }
        }
    //use resizing to a larger screen to designate menu not open
    window.addEventListener("resize", function(){
        if (window.innerWidth>540){
            openButton.innerHTML = "content(s)";
            document.querySelector("body").classList.remove("smallscreen-menu-open");
        }  
    })
    //show or hide contact information (on small screens)
    let contactToggle = document.querySelector(".contact-toggle");
    let contactToggleClose = document.querySelector(".contact-toggle-close");
    contactToggle.addEventListener("click", () => toggleContact());
    contactToggleClose.addEventListener("click", () => toggleContact());
    function toggleContact() {
        document.querySelector("footer").classList.toggle("footer-contact-open");
        document.querySelector("body").classList.toggle("footer-contact-open");
    }

    //if the page has been visited before, don't even show the splash
    //if it hasn't been, show then fade away the splash
    let splashScreen = document.querySelector(".splash-div");
    let body = document.querySelector("body");

    window.addEventListener("load", () => fadeAwaySplash());

    function fadeAwaySplash() {
        function removeSplashFromDOM() {
            splashScreen.remove();
        }
        if (splashScreen){
            body.classList.add("splash-screen-closed");
            setTimeout(removeSplashFromDOM, 5000)
        }
    }
});