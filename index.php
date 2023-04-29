<?php
/**
 * @file
 * This is the 'front controller'.
 */
?>
<?php require_once "layout/header.php" ?>

<div class="container">
  <div class="row gy-5">
    <?php foreach ($petsArray2 as $pets) { ?>
      <div class="col-lg-4 col-sm-5 col-12 border border-1">
        <h2 class="bg-light fs-3 mb-3 rounded-2 p-1 fw-bold">
          <a class="text-decoration-none text-dark nav-link" href="pet_detail_page.php?id=<?php echo $pets['id']; ?>">
            <?php echo $pets['name']; ?>
          </a>
        </h2>
        <img class="img-fluid img-thumbnail shadow p-3 mb-3 bg-body-tertiary rounded" src="images/<?php echo $pets['filename']; ?>">
        
        <blockquote class="py-2 blockquote">
          <span class="p-1 px-2 me-2 rounded-2 text-light bg-primary fs-6"><?php echo $pets['breed']; ?> </span>
          <?php petKeyChecker($pets); ?>
          <?php echo $pets['weight'] . " lbs | "; ?>
        </blockquote>
        <blockquote class="border-start border-5 border-secondary fs-6 p-1 bg-light rounded-2"><?php echo $pets['bio']; ?> </blockquote>

        <p class="card-text"><small class="text-muted">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
        condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
        euismod. Donec sed odio dui.</small></p>
        <p><a class="btn btn-primary fw-bold" href="#">View details &raquo;</a></p>
      
      </div>
    <?php } ?> <!-- end php foreach-->
  </div>

<?php require_once 'layout/footer.php' ?>
