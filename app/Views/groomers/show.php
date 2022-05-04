<div>
  <?php
  foreach ($groomer as $groomer) :
  ?>
    <div class="container py-4">
      <div class="p-5 mb-4 bg-light rounded-3 ">
        <div class="container-fluid py-5 d-flex flex-row justify-content-between flex-wrap">

          <div class="img-holder ma-5">
            <img src="<?= $groomer->g_picture ?>" class="img-fluid" width="300" alt="...">
          </div>
          <div class="text-holder flex-fill">
            <div class="text ms-lg-5">


              <h5 class="card-title"><?= $groomer->g_lastname ?> <?= $groomer->g_firstname ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?= $groomer->g_speciality ?></h6>
              <p>Date d'entrer : <?= $groomer->g_date_entry ?></p>
            </div>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($animals as $animal) : ?>
            <div class="col">
              <a href="<?= "index.php?page=animals.show&a_id=$animal->a_id" ?>">
                <div class="card h-100">
                  <img <?= $animal->a_picture ?> src="..." class="" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $animal->a_name ?></h5>
                    <p class="card-text"><?= $animal->a_description ?></p>
                  </div>
                </div>
            </div>
            </a>
          <?php endforeach; ?>
        </div>


      <?php endforeach; ?>
      </div>
      <div class="card" style="width: 10rem;">

      </div>
    </div>