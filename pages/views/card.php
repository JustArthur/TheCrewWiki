<?php
    function card($link, $icon, $title, $desc) { ?>
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
?>