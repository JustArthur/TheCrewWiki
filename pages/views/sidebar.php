<header id="nav" class="sidebar">
    <div class="logo">
        <a>TheWiki<span class="yellow">Crew</span></a>
    </div>

    <div class="border"></div>

    <ul class="list">
        <a href="<?= ROOT_PATH ?>" class="list-item">Introduction</a>

        <ul class="secondary-list">
            <li class="list-item title">The Crew 2</li>

            <a href="<?= ROOT_PATH ?>pages/client/brands" class="list-item">Liste des marques</a>
            <a href="<?= ROOT_PATH ?>pages/client/activities" class="list-item">Liste des activités</a>
            <a href="<?= ROOT_PATH ?>pages/client/motorflix" class="list-item">Entreprise Motorflix</a>
        </ul>

    </ul>

    <?php if(empty($_SESSION['utilisateur'])) { ?>
        <div class="account">
            <a class="input_btn register" href="<?= ROOT_PATH ?>pages/client/user/register">S'inscrire</a>
            <a class="input_btn login" href="<?= ROOT_PATH ?>pages/client/user/login">Se connecter</a>
        </div>
    <?php } else {?>
        <div class="account">
            <a class="input_btn login" href="<?= ROOT_PATH ?>pages/client/user/mon_compte">Mon compte</a>
            <div onclick="deconnexion()" class="input_btn deco">Se déconnecter</div>
        </div>
    <?php } ?>
</header>

<script>
    function deconnexion() {
        var choix = confirm("Attention, tu vas être déconnecté, est-tu sûr de toi ?");

        if (choix) {
            window.location.href = "<?= ROOT_PATH ?>pages/src/deconnexion";
        } else {}
    }
</script>
<script src="<?= ROOT_PATH ?>javascript/navbar.js"></script>
<script src="<?= ROOT_PATH ?>javascript/sidebar.js"></script>
<script src="<?= ROOT_PATH ?>javascript/changeTheme.js"></script>