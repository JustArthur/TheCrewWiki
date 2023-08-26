function changeTheme(theme) {
    const body = document.body;
    localStorage.setItem('selectedTheme', theme);

    body.classList.remove('light_yellow_theme', 'dark_yellow_theme', 'light_blue_theme', 'dark_blue_theme', 'light_pink_theme', 'dark_pink_theme',  'light_orange_theme', 'dark_orange_theme');

    if (theme === 'light-yellow') {
        body.classList.add('light_yellow_theme');
    } else if (theme === 'dark-yellow') {
        body.classList.add('dark_yellow_theme');
    } else if (theme === 'light-blue') {
        body.classList.add('light_blue_theme');
    } else if (theme === 'dark-blue') {
        body.classList.add('dark_blue_theme');
    } else if (theme === 'light-pink') {
        body.classList.add('light_pink_theme');
    } else if (theme === 'dark-pink') {
        body.classList.add('dark_pink_theme');
    } else if (theme === 'light-orange') {
        body.classList.add('light_orange_theme');
    } else if (theme === 'dark-orange') {
        body.classList.add('dark_orange_theme');
    }
}

function loadSavedTheme() {
    const savedTheme = localStorage.getItem('selectedTheme') || 'dark';
    changeTheme(savedTheme);
}

// Charger le thème enregistré au chargement de la page
loadSavedTheme();
