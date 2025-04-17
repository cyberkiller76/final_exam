<?php include('header.php'); ?>

<h1>All Messages</h1>

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

// Display all records
$sql = "SELECT * FROM string_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['string_id'] . " - Message: " . $row['message'] . "<br>";
    }
} else {
    echo "No records found.";
}
?>

<h2>Delete a Message</h2>
<form action="delete.php" method="post">
    <input type="number" name="string_id" placeholder="Enter ID" required>
    <button type="submit">Delete</button>
</form>

</body>
</html>
