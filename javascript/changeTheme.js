function changeTheme(theme) {
    const body = document.body;
    localStorage.setItem('selectedTheme', theme);

    body.classList.remove('light_yellow_theme', 'dark_yellow_theme', 'light_blue_theme', 'dark_blue_theme');

    if (theme === 'light-yellow') {
        body.classList.add('light_yellow_theme');
    } else if (theme === 'dark-yellow') {
        body.classList.add('dark_yellow_theme');
    } else if (theme === 'light-blue') {
        body.classList.add('light_blue_theme');
    } else if (theme === 'dark-blue') {
        body.classList.add('dark_blue_theme');
    }
}

function loadSavedTheme() {
    const savedTheme = localStorage.getItem('selectedTheme') || 'dark';
    changeTheme(savedTheme);
}

// Charger le thème enregistré au chargement de la page
loadSavedTheme();
