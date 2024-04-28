<?php
// Include database connection
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


// Retrieve data from the tableregis table
$orderSql = "SELECT * FROM tableregis";
$orderResult = $conn->query($orderSql);

// Retrieve data from the products table
$productSql = "SELECT * FROM products";
$productResult = $conn->query($productSql);

// Retrieve counts from the acceptance table
$sql = "SELECT accepted_count, rejected_count FROM acceptance WHERE id = 1";
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch data from the result set
    $row = $result->fetch_assoc();
    // Check if $row is not null before accessing its elements
    if (isset($row['accepted_count'])) {
        $accepted_count = $row['accepted_count'];
    } else {
        // Handle the case when accepted_count is not set
        $accepted_count = 0; // or any default value you want
    }
    if (isset($row['rejected_count'])) {
        $rejected_count = $row['rejected_count'];
    } else {
        // Handle the case when rejected_count is not set
        $rejected_count = 0; // or any default value you want
    }
} else {
    // Handle the case when no rows are returned from the query
    $accepted_count = 0; // or any default value you want
    $rejected_count = 0; // or any default value you want
}



// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f2f5;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #1877f2;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #1877f2;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr {
        border-bottom: 1px solid #ccc;
    }

    tr:last-child {
        border-bottom: none;
    }

    .logout {
        text-align: center;
        margin-top: 20px;
    }

    .logout a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #1877f2;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .logout a:hover {
        background-color: #0e59a0;
    }

    /* Media query for mobile devices */
    @media screen and (max-width: 600px) {
        .container {
            padding: 10px;
        }

        h2 {
            font-size: 24px;
        }

        table {
            font-size: 14px;
        }

        th,
        td {
            padding: 8px;
        }

        .logout a {
            padding: 8px 16px;
        }
    }
    </style>
</head>

<body>
    <h1>Admin Dashboard</h1>





    <!-- Orders table -->
    <div class="container">
        <h2>ORDERS</h2>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Date and Time</th>
                    <th>Phone Number</th>
                    <th>List of Orders</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($orderResult->num_rows > 0) {
                    while ($row = $orderResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['fullname']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['datetime']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo "<td><a href='delete_entry.php?id={$row['id']}'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Products table -->
    <div class="container">
        <h2>Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($productResult->num_rows > 0) {
                    while ($row = $productResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>";
                        echo "<a href='edit_product.php?id={$row['id']}'>Edit</a> | ";
                        echo "<a href='add_product.php'>Add</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No products available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>COOKIE</h2>
        <div>
            <h3>Cookie Acceptance Counts</h3>
            <p>Total Accepted Cookies: <?php echo $accepted_count; ?></p>
            <p>Total Not Accepted Cookies: <?php echo $rejected_count; ?></p>
        </div>

        <!-- Logout link -->
        <div class="logout">
            <a href="admin_logout.php">Logout</a>
        </div>

</body>

</html>