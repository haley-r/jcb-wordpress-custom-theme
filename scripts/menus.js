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
    let splashScreen = document.querySelector("#splash-div");
    let body = document.querySelector("body")

    // if(sessionStorage.getItem("visited")===false){
    //     console.log('in the IF');
    //     body.classList.add("visited");
    // }
    // else{
    //     console.log('in the ELSE');

    //     body.classList.toggle("splash-screen-closed")
    //     // function removeSplashFromDOM() {
    //     //     splashScreen.remove();
    //     // }
    //     setTimeout(body.classList.add("visited"), 5000)
    // }




    // window.addEventListener("load", () => fadeAwaySplash());

    function fadeAwaySplash() {
        // console.log('window loaded');
        // console.log('local storage: ', localStorage);
        // localStorage.setItem("last-visited", Date.now());
        // console.log('local storage after setting last visited: ', localStorage);
        // console.log("visited? ", sessionStorage.getItem("visited"));
        let nowish = Date.now()
        // console.log('nowish:', nowish);
        let lastVisited = Number(localStorage.getItem("last-visited"));
        // console.log('lastVisited: ', lastVisited);
        // console.log('difference: ', nowish-lastVisited);
        let timeElapsedInSeconds = (nowish-lastVisited)/1000;
        console.log('time elapsed:', timeElapsedInSeconds);
        function removeSplashFromDOM() {
            splashScreen.remove();
        }
        // body.classList.add("visited")

        
        // if you've recently visited the site, don't even display the splash
        if (localStorage.getItem('last-visited') && timeElapsedInSeconds<5) {
            console.log('youve been here recently');
            body.classList.add("visited")
            removeSplashFromDOM();
        }   
        //  but if youve never visited, or if its been a while, splash should load
         else{
            localStorage.setItem("last-visited", Date.now());
            body.classList.toggle("splash-screen-closed")
            setTimeout(removeSplashFromDOM, 5000)
         }


    }
});


//before DOM content is loaded, check to see the last time site was visited

let now = Date.now();
let lastVisited = Number(localStorage.getItem("last-visited"));
let timeElapsedInSeconds = (now - lastVisited) / 1000;
console.log('time elapsed:', timeElapsedInSeconds);

// if you've recently visited the site, don't even display the splash
if (localStorage.getItem('last-visited') && timeElapsedInSeconds < 5) {
    console.log('youve been here recently');
    localStorage.setItem("last-visited", Date.now());
    // body.classList.add("visited")
    // removeSplashFromDOM();
}
//  but if youve never visited, or if its been a while, splash should load
else {
    localStorage.setItem("last-visited", Date.now());
    console.log('welcome or welcome back!')
    // body.classList.toggle("splash-screen-closed")
    // setTimeout(removeSplashFromDOM, 5000)
}
