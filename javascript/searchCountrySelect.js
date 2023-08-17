const wrapper = document.querySelector(".wrapper"),
    selectBtn = wrapper.querySelector(".select-btn"),
    searchInp = wrapper.querySelector("input"),
    options = wrapper.querySelector(".options");

let countries = [];

$.ajax({
    url: '../php/getCountry.php',
    type: 'GET',
    success: function(data) {
        countries = JSON.parse(data);
        addCountry();
    }
});

function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}

function updateName(selectedLi) {
    searchInp.value = "";
    addCountry(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.innerText = selectedLi.innerText;

    $.ajax({
        url: '../php/filtre.php',
        type: 'POST',
        data: 'request=' + selectedLi["innerHTML"],
        success: function (data) {
            $(".list-card").html(data);
        }
    });
}

searchInp.addEventListener("keyup", () => {
    let arr = [];
    let searchWord = searchInp.value.toLowerCase();
    arr = countries.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
    }).join("");
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oups! Aucun pays trouvé</p>`;
});

selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));