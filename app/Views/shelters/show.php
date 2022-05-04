<div>

    <?php
    foreach ($shelter as $shelter) :
    ?>
        <h1><?= $shelter->s_name ?></h1>
        <?= "<p> Nombres de soigneur : " . count($groomers) . " </p>" ?>

        <div class="d-flex">
            <?php
            if ($groomers) {
                foreach ($groomers as $groomer) :
            ?>
                    <a href="<?= $groomer->url ?>" class="text-decoration-none">
                        <div class="card" style="width: 10rem;">
                            <img src="<?= $groomer->g_picture  ?> " class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-reset text-decoration-none"><?= $groomer->g_lastname ?> <?= $groomer->g_firstname ?></h5>
                                <h6 class="card-subtitle mb-2 text-reset text-muted text-decoration-none"><?= $groomer->g_speciality ?></h6>

                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            </div>
                        </div>
                    </a>
            <?php
                endforeach;
            }
            ?>
        </div>
        <div>
            <p>Liste des enclos présent dans le refuge</p>
            <table>
                <th> Référence de l'enclos</th>
                <th> Dimension de l'enclos</th>
                <th> Type de l'enclos</th>
                <?php
                if ($enclosures) {
                    foreach ($enclosures as $enclosure) {
                ?><tr>
                            <td><?= $enclosure->e_reference ?></td>
                            <td><?= $enclosure->e_area ?></td>
                            <td><?= $enclosure->e_type ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    <?php endforeach; ?>
</div>