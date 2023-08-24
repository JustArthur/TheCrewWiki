const form_act = document.querySelector(".search_form_act"),
    searchInput_act = form_act.querySelector("input");

searchInput_act.addEventListener("keyup", () => {
    let searchWord = searchInput_act.value.toLowerCase();

    $.ajax({
        url: '../../php/getActivities.php',
        type: 'POST',
        data: 'request=' + searchWord,
        success: function (data) {
            $(".list-card").html(data);
        }
    });
})