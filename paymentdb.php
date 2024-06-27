<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payment_db1";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$Name= $_POST["Name"];
$Address= $_POST["Address"];
$Email=$_POST["Email"];
$Pincode=$_POST["Pincode"];
$CardNumber=$_POST["CardNumber"];
$ExpirationDate=$_POST["ExpirationDate"];
$pin=$_POST["pin"];

$sql = "INSERT INTO login_table1(Name, Address, Email, Pincode, CardNumber, ExpirationDate, pin )
VALUES ('$Name', '$Address','$Email','$Pincode','$CardNumber','$ExpirationDate','$pin')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql_stmt = "SELECT * FROM login_table1";
$result = mysqli_query($conn,$sql_stmt);
 

if ($result->num_rows > 0) 
{
while($row = mysqli_fetch_array($result))
{
echo 'Name:'. $row['Name']. '<br>';
echo 'Address:'. $row['Address']. '<br>';
echo 'Email:'. $row['Email']. '<br>';
echo 'Pincode:'. $row['Pincode']. '<br>';
echo 'CardNumber:'. $row['CardNumber']. '<br>';
echo 'ExpirationDate:'. $row['ExpirationDate']. '<br>';
echo 'pin:'. $row['pin']. '<br>';
}
}
mysqli_close($conn);
?>
