<?php require_once 'layout/header.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  foreach ($_POST as $key => $value) {
    if (!empty($value)) {
      switch ($key) {
        case 'name':
          $petName = $value;
          break;
        case 'age':
          $petAge = $value;
          break;
        case 'weight':
          $petWeight = $value;
          break;
        case 'bio':
          $petBio = $value;
          break;
        case 'filename':
          $petImage = $value;
          break;
        case 'breed':
          $petBreed = $value;
          break;
        default:
          // Do nothing if the key is unknown
      }
    }
  }

  $connection = dbConnector();
  // Create a new PDO instance to connect to the database
  $pdo = new PDO($connection['host'], $connection['user'], $connection['pass']);

  // Prepare the SQL query to insert a new pet record
  $stmt = $pdo->prepare(
    "INSERT INTO pets 
      (name, age, weight, bio, filename, breed) 
      VALUES (:name, :age, :weight, :bio, :filename, :breed)"
  );

  // Calculate the age string based on the pet's age.
  $ageString = (int) ($petAge > 1) ? $petAge . " years" : $petAge . " year";

  // Bind the parameters with the values from the form.
  $stmt->bindValue(':name', $petName ?? '');
  $stmt->bindParam(':age', $ageString);
  $stmt->bindValue(':weight', $petWeight ?? '');
  $stmt->bindValue(':bio', $petBio ?? '');
  $stmt->bindValue(':filename', $petImage ?? '');
  $stmt->bindValue(':breed', $petBreed ?? '');

  // Execute the query to insert the new pet record.
  $stmt->execute();

  // Redirects to home page after submit.
  header('Location: index.php');
}

?>

<div class="container">
  <div class="row">
    <div class="col-xs-6">
      <h1>Add your new pet!</h1>

      <!-- PET ADD FORM -->
      <form action="pets_new.php" method="POST">
        <div class="form-group">
          <label for="pet-name" class="py-2 control-label">Pet Name</label>
          <input type="text" name="name" id="pet-name" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="pet-age" class="py-2 control-label">Pet Age</label>
          <input type="text" name="age" id="pet-age" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="pet-weight" class="py-2 control-label">Pet Weight(lbs)</label>
          <input type="text" name="weight" id="pet-weight" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="pet-breed" class="py-2 control-label">Pet Breed</label>
          <input type="text" name="breed" id="pet-breed" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="pet-bio" class="py-2 control-label">Pet Bio</label>
          <input type="text" name="bio" id="pet-bio" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="formFile" class="py-2 form-label">Pet Image</label>
          <input class="form-control" name="filename" id="pet-image" type="file" id="formFile" required>
        </div>

        <button type="submit" class="my-3 btn btn-primary">
          Add a furry friend!
        </button>
      </form>
      <!-- PET ADD FORM END -->

    </div>
  </div>
</div>
<?php require_once 'layout/footer.php'; ?>