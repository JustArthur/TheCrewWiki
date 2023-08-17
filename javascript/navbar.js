//-- Changement de la navBar
const nav = document.querySelector('#nav');

const onScroll = (event) => {
    const scrollPosition = event.target.scrollingElement.scrollTop;

    if(scrollPosition >  10) {
        if(!nav.classList.contains('scrolled-down')) {
            nav.classList.add('scrolled-down');
        }
    } else {
        if(nav.classList.contains('scrolled-down')) {
            nav.classList.remove('scrolled-down');
        }
    }
}

if (window.innerWidth <= 780) {
    document.addEventListener("scroll", onScroll);
}