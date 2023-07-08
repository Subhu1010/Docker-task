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
    $userName = $_POST["username"]; // Changed from "name" to "username"
    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];

    // Check if user exists
    $query = "SELECT * FROM users WHERE username = '$userName' AND email = '$userEmail'"; // Changed from "name" to "username"
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User exists
        echo "User already exists";
    } else {
        // Insert the user
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$userName', '$userEmail', '$userPassword')"; // Changed from "name" to "username"
        if ($conn->query($insertQuery) === TRUE) {
            echo "User inserted successfully";
        } else {
            echo "Error inserting user: " . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>

<!-- HTML form -->
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label> <!-- Changed from "name" to "username" -->
        <input type="text" name="username" id="username" required> <!-- Changed from "name" to "username" -->
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

