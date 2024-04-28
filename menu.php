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

// Retrieve menu items from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$menuItems = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Food Hub and Unli Wings</title>
    <link rel="stylesheet" href="MENU.CSS">
    <style>
    body,
    h1,
    h2,
    h3,
    p,
    ul,
    li {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: white;
        color: #333;
        overflow-x: hidden;
        /* Prevent horizontal scrolling */
    }

    .container {
        margin: 0 auto;
        /* Center the container */
        width: 90%;
        font-family: Copperplate, Papyrus, fantasy;
        color: white;
        background-color: rgba(0, 0, 0, 0.8);
    }

    header {
        background-color: rgba(0, 0, 0, 0.2);
        padding: 2px;
        position: fixed;
        /* Fix the navigation bar at the top */
        width: 100%;
        /* Make it full-width */
        top: 0;
        /* Align it at the top */
        z-index: 1000;
        /* Ensure it's above other content */
        height: min-content;
        transition: background-color 0.3s ease;
        /* Add smooth transition */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 {
        font-size: 50px;
    }

    .logo {
        display: inline-block;
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        /* Make it a circle */
        padding: 7px;
        /* Adjust padding as needed */
    }

    .logo img {
        height: 100px;
        /* Adjust logo height as needed */
        cursor: pointer;
    }

    .menu-icon {
        display: none;
        cursor: pointer;
        float: right;
        /* Align the toggle button to the right */
        position: relative;
    }

    .menu {
        display: flex;
        float: right;
        font-size: 25px;
        margin: 0 0 0;
    }

    .menu li {
        display: inline-block;
        margin-right: 20px;
        content: initial;
    }

    .menu li a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: color 0.3s ease;
        margin-right: 50px;
    }

    .menu a:hover {
        color: blue;
        /* Color on hover */
    }

    .menu a.active {
        color: blue;
        /* Color for active link */
    }

    #menu-toggle {
        display: none;
    }

    .hero {
        overflow: hidden;
        background-image: url("chix.png");
        background-repeat: no-repeat;
        background-size: cover;
        height: 400px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ff6600;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #cc5500;
    }

    .intro {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: black;
        color: white;
        margin-top: -440px;
        /* Adjust as needed */
    }

    .intro img {
        float: right;
        max-width: 22%;
        padding-top: 2%;
    }

    .intro p {
        text-align: left;
        text-align: center;
        margin-right: 10px;
        font-size: 30px;
        color: white;
        padding-top: 2%;
    }

    .phh {
        background-color: black;
        text-align: center;
        padding: 20px;
        color: #fff;
    }

    .history {
        overflow: hidden;
        background-image: url("brik.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .menunas img {
        text-align: center;
        margin-left: 25%;
        width: 50%;
        /* Adjust the width as needed */
        height: 1000%;
        padding-top: 20%;
        padding-bottom: 20%;
    }

    /* CSS styles for frame-like design */
    .frame {
        border: 4px solid #ccc;
        /* Border around the photo */
        padding: 5px;
        /* Padding inside the frame */
        border-radius: 10px;
        /* Rounded corners for the frame */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        /* Shadow effect */
    }

    .frame img {
        width: 100%;
        /* Ensure the photo fills the frame */
        height: auto;
        /* Maintain aspect ratio */
        border-radius: 5px;
        /* Rounded corners for the photo */
    }

    .prr {
        text-align: center;
        font-size: 50px;
    }

    .menu-container {
        background-image: url('brik.png');
        /* Corrected */
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        /* Position relative for pseudo-elements */
    }

    /* Banner effect styles */
    .menu-container::before {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: url('brick-wall-texture.jpg');
        /* Adjust the URL to your texture */
        background-size: cover;
        border-radius: 10px;
        z-index: -1;
        /* Behind the menu items */
    }

    /* Menu item styles */
    .menu-item {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: calc(33.33% - 40px);
        /* Adjust width as needed */
        text-align: center;
        position: relative;
        /* Position relative for pseudo-elements */
    }

    .menu-item::before {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: rgba(255, 255, 255, 0.5);
        /* Adjust opacity as needed */
        border-radius: 10px;
        z-index: -1;
        /* Behind the menu items */
    }

    .menu-item h2 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #333;
    }

    .menu-item p {
        font-size: 16px;
        color: #666;
        margin-bottom: 5px;
    }

    .menu-item p.price {
        font-weight: bold;
        color: #ff6600;
        /* Adjust price color as needed */
    }

    footer {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }

    @media screen and (max-width: 768px) {

        /* Adjustments for smaller screens */
        body,
        h1,
        h2,
        h3,
        p,
        ul,
        li {
            font-size: 16px;
            /* Adjust font sizes */
        }

        .content {
            font-size: 16px;
            /* Adjust font size */
            padding-top: 20px;
            /* Adjust padding top */
        }

        .content h2 {
            font-size: 24px;
            /* Adjust font size */
        }

        .content p {
            font-size: 16px;
            /* Adjust font size */
        }

        .next p,
        .happy p,
        .intro p {
            font-size: 16px;
            /* Adjust font size */
        }

        .intro {
            height: 100vh;
            /* Keep height fixed */
        }

        .slideshow {
            width: 100%;
            /* Full width */
        }

        .slideshow img {
            width: 80%;
            /* Adjust image width as needed */
            max-width: 100%;
            /* Ensure the image doesn't exceed its container */
            height: auto;
            /* Maintain aspect ratio */
            position: absolute;
            /* Position the image absolutely */
            top: 50%;
            /* Position the image vertically in the middle */
            left: 50%;
            /* Position the image horizontally in the middle */
            transform: translate(-50%, -50%);
            /* Center the image */
            border: 10px solid #333;
            /* Set border around the "phone" */
            border-radius: 20px;
            /* Add border radius for rounded corners */
            overflow: hidden;
            margin: 0;
            /* Remove margin */
        }

        .window {
            width: 90%;
            /* Adjust width for smaller screens */
            max-width: 300px;
            /* Set maximum width */
            height: auto;
            /* Auto height */
        }

        header h1 {
            font-size: 30px;
            /* Adjust font size */
        }

        #menu-toggle {
            display: none;
            /* Hide the checkbox by default */
        }

        #menu-toggle:checked+.menu {
            display: flex;
            /* Show menu when checkbox is checked */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            /* Semi-transparent background */
            z-index: 1000;
            /* Ensure it's above other content */
        }

        .menu {
            display: none;
            /* Hide menu by default */
            text-align: center;
            width: 100%;
            height: 100%;
            /* Ensure menu fills the entire screen */
            padding-top: 60px;
            /* Add padding to center menu content vertically */
            padding-left: 90px;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            display: block;
            margin: 10px 0;
        }

        .logo {
            display: block;
            /* Ensure logo is always visible */
            position: fixed;
            /* Keep the logo fixed */
            top: 20px;
            /* Adjust top positioning as needed */

            z-index: 1001;
            /* Ensure logo is above other content */
        }

        /* Style the toggle button for mobile */
        .menu-icon {
            display: block;
            cursor: pointer;
            font-size: 30px;
            line-height: 1;
            position: absolute;
            top: 25px;
            right: 10px;
            z-index: 1002;
            /* Ensure it's above logo */
            margin-right: 15px;
        }
    }
    </style>
</head>

<body>
    <header id="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        <ul class="menu">
            <li><a href="client.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="menu.php" class="active">Menu</a></li>
            <li><a href="location.php">Locations</a></li>
            <li><a href="contacts.php">Contact</a></li>
        </ul>
    </header>
    <section class="hero">
        <!-- Include your hero section content here -->
    </section>

    <div class="phh">
        <h1>LOOK WHAT WE GOT HERE 👀</h1>
    </div>

    <div class="menu-container">
        <?php
        // Display menu items
        if (!empty($menuItems)) {
            foreach ($menuItems as $item) {
                echo "<div class='menu-item'>";
                echo "<h2>{$item['name']}</h2>";
                echo "<p>{$item['description']}</p>";
                echo "<p>Price: {$item['price']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No menu items available.</p>";
        }
        ?>
    </div>

    <footer>
        <div>
            <p>&copy; 2024 MG Food Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="sc.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>