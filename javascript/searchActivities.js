const form = document.querySelector(".search_form"),
    searchInput = form.querySelector("input");

searchInput.addEventListener("keyup", () => {
    let searchWord = searchInput.value.toLowerCase();
    var ActivityId = searchInput.id

    $.ajax({
        url: '../../php/getActivities.php',
        type: 'POST',
        data: 'request=' + searchWord + '&id_brand=' + ActivityId,
        success: function (data) {
            $(".list-card").html(data);
        }
    });
})