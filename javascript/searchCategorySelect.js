const wrapper = document.querySelector(".wrapper"),
    selectBtn = wrapper.querySelector(".select-btn"),
    searchInp = wrapper.querySelector("input"),
    options = wrapper.querySelector(".options");

let categories = [];

$.ajax({
    url: '../../php/getCategory.php',
    type: 'GET',
    success: function(data) {
        categories = JSON.parse(data);
        categories.push("Toutes les catégories");

        var indexElement = categories.indexOf("Toutes les catégories");

        if (indexElement !== -1) {
            categories.splice(indexElement, 1);
            categories.unshift("Toutes les catégories");
        }

        addCategory();
    }
});

function addCategory(selectedCategory) {
    options.innerHTML = "";
    categories.forEach(category => {
        let isSelected = category == selectedCategory ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${category}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}

function updateName(selectedLi) {
    searchInp.value = "";
    addCategory(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.innerText = selectedLi.innerText;

    $.ajax({
        url: '../../php/filtreCategory.php',
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
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oups! Aucune catégorie trouvée</p>`;
});

selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));