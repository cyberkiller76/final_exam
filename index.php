<?php include 'header.php'; ?>

<h2>Enter a Message</h2>
<form method="POST" action="index.php">
    <input type="text" name="message" required>
    <input type="submit" name="submit" value="Submit">
</form>

<br>
<a href="showAll.php">Show all records</a>

<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "final";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    $msg = $conn->real_escape_string($_POST['message']);
    $sql = "INSERT INTO string_info (message) VALUES ('$msg')";
    if ($conn->query($sql) === TRUE) {
        echo "Message saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>

</body>
</html>
