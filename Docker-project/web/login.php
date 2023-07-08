<?php
// MySQL server configuration
$servername = "mysql"; // Docker container name or IP address
$database = "mydata"; // Your database name
$username = "root"; // Your MySQL username
$password = "12345"; // Your MySQL password

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user details from the form
    $userName = $_POST["username"];
    $userPassword = $_POST["password"];

    // Check if user exists
    $query = "SELECT * FROM users WHERE username = '$userName'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User exists
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
	if ($userPassword == $storedPassword){
		include("welcome.html");
	#   if (password_verify($userPassword, 123)) {
            // Redirect to welcome.html	       
       	       #        header("Location: http://welcome.html");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User does not exist";
    }

    // Close the connection
    $conn->close();
}
?>


<!-- HTML form -->
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h1>User Login</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

