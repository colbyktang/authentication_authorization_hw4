<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "COSC4343";
$dbname = "user_accounts";

$login_username = $_POST['username'];
$login_password = md5($_POST['password']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";
echo "login_username: " . $login_username . "<br>";
echo "login_password: " . $login_password . "<br>";

include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) {
    // the code was incorrect
    // you should handle the error so that the form processor doesn't continue
  
    // or you can use the following code if there is no validation or you do not know how
    echo "The security code entered was incorrect.<br /><br />";
    echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
    exit;
}


$sql = "SELECT username, password FROM user_accounts WHERE username='$login_username' AND password='$login_password'";
echo "sql: " . $sql . "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
        echo "Username/Password: " . $row["username"]. " " . $row["password"]. "<br>";
    }
}
else {
    echo "0 results";
}
?>