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

echo "Connected successfully<br>";

$sql = "INSERT INTO user_accounts (userID, username, password, clearance) VALUES (1, 'alice', '@1!c3', 'T')";
echo "sql: " . $sql . "<br>";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}

$sql = "SELECT username, password FROM user_accounts";
echo "sql: " . $sql . "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
        echo "Username/Password: " . $row["username"]. " " . $row["password"] . "<br>";
    }
}
else {
    echo "0 results";
}

?>