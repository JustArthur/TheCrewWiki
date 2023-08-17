const wrapper = document.querySelector(".wrapper"),
    selectBtn = wrapper.querySelector(".select-btn"),
    searchInp = wrapper.querySelector("input"),
    options = wrapper.querySelector(".options");


// let countries = [];


// var xhr = new XMLHttpRequest();

// xhr.onreadystatechange = function() {
//     if (xhr.readyState === 4) {
//         if (xhr.status === 200) {
//             try {
//                 var countries = JSON.parse(xhr.responseText);
//                 addCountry();

//                 searchInp.addEventListener("keyup", () => {
//                     let arr = [];
//                     let searchWord = searchInp.value.toLowerCase();
//                     arr = countries.filter(data => {
//                         return data.toLowerCase().startsWith(searchWord);
//                     }).map(data => {
//                         let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
//                         return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
//                     }).join("");
//                     options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oups! Aucun pays trouvé</p>`;
//                 });
//             } catch (error) {
//                 console.error('Erreur lors de l\'analyse JSON :', error);
//             }
//         } else {
//             console.error('Erreur de requête :', xhr.status);
//         }
//     }
// };

// xhr.open('GET', '../php/getCountry.php', true);
// xhr.send();

let countries = ["Afghanistan", "Algérie", "Argentine", "Australie", "Bangladesh", "Belgique", "Bhoutan",
    "Brésil", "Canada", "Chine", "Danemark", "Éthiopie", "Finlande", "France", "Allemagne",
    "Hongrie", "Islande", "Inde", "Indonésie", "Iran", "Italie", "Japon", "Malaisie",
    "Maldives", "Mexique", "Maroc", "Népal", "Pays-Bas", "Nigéria", "Norvège", "Pakistan",
    "Pérou", "Russie", "Roumanie", "Afrique du Sud", "Espagne", "Sri Lanka", "Suède", "Suisse",
    "Thaïlande", "Turquie", "Ouganda", "Ukraine", "États-Unis", "Royaume-Uni", "Vietnam"];


function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
        let isSelected = country == selectedCountry ? "selected" : "";
        let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
        options.insertAdjacentHTML("beforeend", li);
    });
}

addCountry();

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