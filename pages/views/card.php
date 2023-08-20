<?php
    function userCard($link, $icon, $title, $desc) { ?>
        <a href="<?= $link ?>" class="card">
            <div class="card-content">
                <div class="card-image">
                    <span class="material-symbols-rounded icon"><?= $icon ?></span>
                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <span class="material-symbols-rounded icon"><?= $icon ?></span>

                        <div class="card-info-title">
                            <h3><?= $title ?></h3>
                            <h4><?= $desc ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php }

    function brandCard($link, $img, $imgFlag, $title, $date) { ?>
        <a href="<?= $link ?>" class="card">
            <div class="card-content">
                <div class="card-image">
                    <img src="<?= $img ?>">
                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <img src="<?= $imgFlag ?>" class="flag">
                        <div class="card-info-title">
                            <h3><?= $title ?></h3>
                            <h4>Créer en <?= $date ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php }

    function ActivityCard($link, $img, $imgFlag, $title) { ?>
        <a href="<?= $link ?>" class="card">
            <div class="card-content">
                <div class="card-image">
                    <img src="<?= $img ?>">
                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <img src="<?= $imgFlag ?>" class="flag">
                        <div class="card-info-title">
                            <h3><?= $title ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php }

    function carCard($link, $img, $imgFlag, $title, $date, $summit, $battlepass, $icon, $text_summit, $text_battlepass, $text_icon, $text_price) { ?>
        <a href="<?= $link ?>" class="card <?= $summit . $battlepass . $icon ?>">
            <div class="card-content">
                <div class="card-image">
                    <img src="<?= $img ?>">
                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <img src="<?= $imgFlag ?>" class="flag">
                        <div class="card-info-title">
                            <h3><?= $title ?></h3>
                            <h4>Sortie en <?= $date?></h4>
                            <?= $text_summit . $text_battlepass . $text_icon ?>
                            <?= $text_price ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
<?php } ?>