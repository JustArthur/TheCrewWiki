function changeTheme(theme) {
    const body = document.body;
    localStorage.setItem('selectedTheme', theme);

    if (theme === 'light') {
        body.classList.remove('.dark_yellow_theme');
        body.classList.add('light_yellow_theme');

    } else if (theme === 'dark') {
        body.classList.remove('light_yellow_theme');
        body.classList.add('.dark_yellow_theme');
    }
    
}


function loadSavedTheme() {
    const savedTheme = localStorage.getItem('selectedTheme') || 'dark';
    changeTheme(savedTheme);
}

// Charger le thème enregistré au chargement de la page
loadSavedTheme();