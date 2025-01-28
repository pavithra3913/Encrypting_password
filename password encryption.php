<?php
// Connect to MySQL
$mysqli = new mysqli('localhost','root','', 'mails');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Encrypt the password using MD5
    $encrypted_password = md5($password);

    // Insert user into database
    $sql = "INSERT INTO generate (username, password) VALUES ('$username', '$encrypted_password')";
    
    if ($mysqli->query($sql) === TRUE) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

// Close MySQL connection
$mysqli->close();
?>

