<div>
  <?php
  foreach ($animal as $animal) :
    $animal->groomersUrl
  ?>
    <div class="container py-4">
      <div class="p-5 mb-4 bg-light rounded-3 ">
        <div class="container-fluid py-5 d-flex flex-row justify-content-between flex-wrap">

          <div class="img-holder ma-5">
            <img src="<?= $animal->a_picture ?>" class="img-fluid" width="300" alt="...">
          </div>
          <div class="text-holder flex-fill">
            <div class="text ms-lg-5">


              <h5 class="card-title"><?= $animal->a_name ?></h5>
              <h6 class="card-subtitle mb-2 "><?= $animal->a_race ?></h6>
              <h6 class="card-subtitle mb-2 text-muted"><?= $animal->family ?> <?= $animal->a_gender ?>
                <?= $animal->specie ?>
                <em><?= $animal->a_scientific_name ?></em>
              </h6>
              <a href="<?= $animal->groomersUrl ?>"> <?= $favoriteGroomer[0]->g_firstname ?> <?= $favoriteGroomer[0]->g_lastname ?> </a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
      </div>
    </div>