<?php
$servername = "localhost";
$username = "root";
$password = "COSC4343";
$dbname = "user_accounts";

$login_username = $_POST['username'];
$login_password = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";
echo "login_username: " . $login_username;
echo "login_password: " . $login_password;

$sql = "SELECT username, password FROM user_accounts WHERE username=\'$login_username\' AND password=\'$login_password\'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    // this while loop does not work, investigate fetch_assoc()

    while ($row = $result->fetch_assoc()) {
        echo "Username/Password: " . $row["username"]. " " . $row["password"]. "<br>";
    }
}
else {
    echo "0 results";
}
?>