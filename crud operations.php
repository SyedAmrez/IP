<?php
// Database connection
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create operation
function createProduct($conn, $name, $price) {
    $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read operation
function readProducts($conn) {
    $sql = "SELECT id, name, price FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

// Update operation
function updateProduct($conn, $id, $name, $price) {
    $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete operation
function deleteProduct($conn, $id) {
    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Example usage
// Create a product
createProduct($conn, "Product 1", 10.99);

// Read all products
readProducts($conn);

// Update a product
updateProduct($conn, 1, "Updated Product 1", 15.99);

// Delete a product
deleteProduct($conn, 1);

// Close connection
$conn->close();
?>
