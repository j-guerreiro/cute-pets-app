<?php require_once 'layout/header.php'; ?>
<?php require_once 'lib/helper_functions.php'; ?>
<?php
  $petId = $_GET['id'];
  $singlePet = querySinglePet($petId);
?>
  <div class="container">
  <div class="row">
    <div class="col-md-12 offset-md-0">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $singlePet['name']; ?>'s profile</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <img src="images/<?php echo $singlePet['filename'];?>" alt="Pet image" class="img-thumbnail">
            </div>
            <div class="col-md-8">
              <ul class="list-group">
                <li class="list-group-item"><strong>Name:</strong> <span id="pet-name"><?php echo $singlePet['name'];?></span></li>
                <li class="list-group-item"><strong>Age:</strong> <span id="pet-species"><?php echo $singlePet['age'];?></span></li>
                <li class="list-group-item"><strong>Weight:</strong> <span id="pet-weight"><?php echo $singlePet['weight'];?></span></li>
                <li class="list-group-item"><strong>Breed:</strong> <span id="pet-breed"><?php echo $singlePet['breed'];?></span></li>
                <li class="list-group-item"><strong>Bio:</strong> <p class="blockquote" id="pet-description"><?php echo $singlePet['bio'];?></p></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'layout/footer.php'; ?>