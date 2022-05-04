<h3> Liste des employée </h3>

<div class="container d-flex justify-content-evenly mt-3">

    <?php foreach ($groomers as $groomer) : ?>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="<?= $groomer->url ?>">
                    <div class="card" style="width: 10rem;">
                        <img src="<?= $groomer->g_picture  ?> " class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $groomer->g_lastname ?> <?= $groomer->g_firstname ?></h5>
                            <p><?= $groomer->g_speciality ?></p>
                            <p> Refuge : <?= $groomer->g_shelter ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>