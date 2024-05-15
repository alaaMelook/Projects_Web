<?php


include 'config.php';

session_start();

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Sanitize and validate input
$name = htmlspecialchars($_POST['name']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$number = htmlspecialchars($_POST['number']);
$message = htmlspecialchars($_POST['message']);

if(isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
} else {
    // Handle missing name
}

if(isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
} else {
    // Handle missing email
}

if(isset($_POST['number'])) {
    $number = htmlspecialchars($_POST['number']);
} else {
    // Handle missing number
}

if(isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);
} else {
    // Handle missing message
}

$sql = "INSERT INTO contacts (name, email, number, message)
VALUES ('$name', '$email', '$number', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}

$conn->close();
?>
