document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll(".secondary-list a");
    var currentURL = window.location.href;

    links.forEach(function(link) {
        var linkURLs = link.href.split("/");
        var lastSegment = linkURLs[linkURLs.length - 1].split("#")[0];
        var currentURLLastSegment = currentURL.split("/").pop();

        console.log("Link Last Segment:", lastSegment);
        console.log("Current URL Last Segment:", currentURLLastSegment);

        if (lastSegment === currentURLLastSegment) {
            link.classList.add("active");
        }
    });
});
