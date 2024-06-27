<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Safely retrieve POST variables
$Name = $_POST["name"] ?? '';
$Address = $_POST["address"] ?? '';
$Email = $_POST["email"] ?? '';
$Pincode = $_POST["pincode"] ?? '';
$CardType = $_POST["card_type"] ?? '';
$CardNumber = $_POST["card_number"] ?? '';
$ExpDate = $_POST["exp_date"] ?? '';
$CVV = $_POST["cvv"] ?? '';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO login_db5 (Name, Address, Email, Pincode, CardType, CardNumber, ExpDate, CVV) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $Name, $Address, $Email, $Pincode, $CardType, $CardNumber, $ExpDate, $CVV);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();

$sql_stmt = "SELECT * FROM login_db5";
$result = $conn->query($sql_stmt);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo 'Name: ' . $row['Name'] . '<br>';
        echo 'Address: ' . $row['Address'] . '<br>';
        echo 'Email: ' . $row['Email'] . '<br>';
        echo 'Pincode: ' . $row['Pincode'] . '<br>';
    }
}

$conn->close();
?>
