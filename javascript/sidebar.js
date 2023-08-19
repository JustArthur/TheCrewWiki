document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll(".secondary-list a");
    var currentURL = window.location.href;

    links.forEach(function(link) {
        if (link.href === currentURL) {
            link.parentElement.classList.add("active");
        }
    });
});