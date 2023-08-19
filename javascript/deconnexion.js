function deconnexion() {
    var choix = confirm("Attention, tu vas être déconnecté, est-tu sûr de toi ?");

    if (choix) {
        window.location.href = "<?= ROOT_PATH ?>pages/src/deconnexion";
    } else {}
}