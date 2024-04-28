<?php
// Include database connection and start session
session_start();
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = "password123.."; // Change this to your database password
$dbname = "register"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Insert product into the database
    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
    if ($conn->query($sql) === TRUE) {
        // Set success message
        $success_message = "Product added successfully!";
        
        // Redirect to admin_dashboard.php
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
    /* Your CSS styles */
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Product</h2>
        <!-- Display success message if set -->
        <?php if (isset($success_message)) : ?>
        <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Product Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price"><br><br>
            <input type="submit" value="Add Product">
        </form>
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>