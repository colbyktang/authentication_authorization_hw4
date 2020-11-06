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

echo "Connected successfully! <br>";

$username = 'alice';
$password = md5('@1!c3');
$clearance = 'T';
insert_user($conn, 1, $username, $password, $clearance);

$username = 'bob';
$password = md5('B0b');
$clearance = 'S';
insert_user($conn, 2, $username, $password, $clearance);

$username = 'charlie';
$password = md5('Ch@r1!3');
$clearance = 'C';
insert_user($conn, 3, $username, $password, $clearance);

$username = 'dave';
$password = md5('D@v3');
$clearance = 'U';
insert_user($conn, 4, $username, $password, $clearance);

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

function insert_user ($conn, $userID, $username, $password, $clearance) {
    $sql = "INSERT INTO user_accounts (userID, username, password, clearance) VALUES ($userID, '$username', '$password', '$clearance')";
    echo "sql: " . $sql . "<br>";
    if ($conn->query($sql) === TRUE) {
        echo $username . " inserted successfully! <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

?>