const form = document.querySelector(".search_form"),
    searchInput = form.querySelector("input");

searchInput.addEventListener("keyup", () => {
    let searchWord = searchInput.value.toLowerCase();
    var brandId = searchInput.id

    $.ajax({
        url: '../../php/getCars.php',
        type: 'POST',
        data: 'request=' + searchWord + '&id_brand=' + brandId,
        success: function (data) {
            $(".list-card").html(data);
        }
    });
})