<?php
$servername = "localhost";
$username = "root";
$password = "COSC4343";
$dbname = "user_accounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$sql = "SELECT username, password FROM user_accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    // this while loop does not work, investigate fetch_assoc()
    echo $result;

    while ($row = mysqli_fetch_assoc($result)) {
        echo "Username/Password: " . $row["username"]. " " . $row["password"]. "<br>";
    }
    else {
        echo "0 results";
    }
}

?>