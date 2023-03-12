if(screen.height > 800) {
    let heightMain = document.querySelector("main").clientHeight;
    let heightFooter = document.querySelector("footer").clientHeight;
    if(heightMain < screen.height) {
        document.querySelector("main").style.height = `calc(100vh - ${heightFooter}px)`;
    }
}