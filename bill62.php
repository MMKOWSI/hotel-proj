<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bill6_db1";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$items = ["BRIYANI", "CHICKEN-BURGER", "CHICKEN-LOLLIPOP", "CHICKEN-PIZZA", "VEG-RICE", "VEG-BURGER", "VEG-ROLL", "VEG-PIZZA"];
$prices = [100, 150, 200, 250, 50, 100, 150, 200];

// Check if 'Quantity' is set in $_POST and is an array
if (isset($_POST['Quantity']) && is_array($_POST['Quantity'])) {
  $quantities = $_POST['Quantity'];

  for ($i = 0; $i < count($items); $i++) {
    // Check if quantity is set for the current item and is greater than zero
    if (isset($quantities[$i]) && $quantities[$i] > 0) {
      $Item = $items[$i];
      $Price = $prices[$i];
      $Quantity = $quantities[$i];
      $Total = $Price * $Quantity;
      $sql = "INSERT INTO login_table (Item, Price, Quantity, Total) VALUES ('$Item', '$Price', '$Quantity', '$Total')";
      if (mysqli_query($conn, $sql)) {
        echo "Item: $Item<br>";
        echo "Price: $Price<br>";
        echo "Quantity: $Quantity<br>";
        echo "Total: $Total<br>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }
} else {
  echo "No quantities received.<br>";
  // Print the received POST data for debugging
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
}

mysqli_close($conn);
?>
