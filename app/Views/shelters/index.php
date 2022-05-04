<h3> Liste des refuge </h3>

<div class="container d-flex justify-content-evenly mt-3">

    <?php foreach ($shelters as $shelter) : ?>
        <div class="card" style="width: 18rem; text-decoration:none !important;">
            <div class="card-body">
                <a href="<?= $shelter->url ?>">
                    <h5 class="card-title" style="text-decoration:none ; "><?= $shelter->s_name; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $shelter->s_city; ?></h6>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>