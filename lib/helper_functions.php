<?php

require_once 'database/config.php';

$connection = dbConnector();

function getPets($connection) {
  // Establish a PDO database connection
  $pdo = new PDO($connection['host'], $connection['user'], $connection['pass']);

  // Define the SQL query to retrieve all pets
  $sql = "SELECT * FROM pets";

  // Prepare and execute the SQL query
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  // Fetch the results as an associative array
  $petsDataArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return the pet data array
  return $petsDataArray;
}


$petsArray2 = [];
$petsArray2 = getPets($connection);
// shuffle($petsArray2);
$pupCount = count($petsArray2);

/**
 * Queries a single pet from db.
 * @return array
 */
function querySinglePet(string $petId) {
  $dbConnection = dbConnector();

  // Establish a PDO database connection
  $pdo = new PDO($dbConnection['host'], $dbConnection['user'], $dbConnection['pass']);
  $querySinglePet = "SELECT * FROM pets WHERE id=" . $petId;

  // Prepare and execute the SQL query.
  $stmt = $pdo->prepare($querySinglePet);
  $stmt->execute();

  // Fetch the results as an associative array.
  $singlePetDataArray = $stmt->fetch(PDO::FETCH_ASSOC);

  // Return the pet data array.
  return $singlePetDataArray;
}

/**
 * Helper function to check if age is empty or not
 */
function petKeyChecker(array $pets) {
  // If the array key exists and it is not empty.
  if (array_key_exists('age', $pets) && $pets['age'] == 'hidden') {
    // If the array key exists and it has the 'hidden' value.
    echo "<strong>(consult tutor)</strong> " . "|"; 
  } 
  elseif (array_key_exists('age', $pets) && $pets['age'] != '') {
    echo $pets['age'] . " old | ";
  }
  // if none of the above is true, then print unknown.
  else {
    echo "<strong>unknown</strong> " . "|";
  }
}

/**
 * Function that generates random messages.
 */
function randomMessager() {
  // Simple array with a couple of funny messages.
  $arrayMessages = [
    'Mischievous pets',
    'Whiny kitties',
    'Whiny doggies',
    'Naughty little dogs',
    'Naughty little cats',
    'Cute little dogs',
    'Crazy little cats',
    'Cute little animals',
    'Furry little cats',
    'Graceful pets',
    'Lazy kitties',
    'Lazy doggies',
    'Furry best friends',
  ];
  
  // Randomizer of messages.
  $cleverWelcomeMessage = $arrayMessages[rand(0, 7)];
  // $cleverWelcomeMessage = strtoupper(strtolower($cleverWelcomeMessage));

  return $cleverWelcomeMessage;
}