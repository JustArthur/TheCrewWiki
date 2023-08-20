const form = document.querySelector(".search_form"),
    searchInput = form.querySelector("input");

searchInput.addEventListener("keyup", () => {
    let searchWord = searchInput.value.toLowerCase();

    $.ajax({
        url: '../../php/getCategory.php',
        type: 'POST',
        data: 'request=' + searchWord,
        success: function (data) {
            $(".list-card").html(data);
        }
    });
})