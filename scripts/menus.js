document.addEventListener("DOMContentLoaded", function () {
    let openButton = document.querySelector(".menu-toggle");
    //use the button to designate menu open or not
    openButton.addEventListener("click", () => toggleMenu());
        function toggleMenu() {
            window.scrollTo(0, 0);
            document.querySelector("body").classList.toggle("smallscreen-menu-open");
            if(openButton.innerHTML!="close"){
                openButton.innerHTML = "close";
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

    let contactToggle = document.querySelector(".contact-toggle");
    //show or hide contact information (on small screens)
    contactToggle.addEventListener("click", () => toggleContact());
    function toggleContact() {
        document.querySelector("footer").classList.toggle("footer-contact-open");
        // if (contactToggle.innerHTML != "contact up") {
        //     contactToggle.innerHTML = "close contact";
        // } else {
        //     contactToggle.innerHTML = "contact up";
        // }
    }
    //use resizing to a larger screen to designate menu not open
    // window.addEventListener("resize", function () {
    //     if (window.innerWidth > 540) {
    //         openButton.innerHTML = "content(s)";
    //         document.querySelector("body").classList.remove("smallscreen-menu-open");
    //     }
    // })
});