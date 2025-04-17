<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Change if needed
$dbname = "final";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$string_id = $_POST['string_id'];

// Delete from database
$sql = "DELETE FROM string_info WHERE string_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $string_id);

if ($stmt->execute()) {
    echo "Message deleted successfully.<br>";
    echo '<a href="showAll.php">Show all records</a>';
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
