
<?php

include 'db.php';

function getProducts()
{
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

function getProductById($id)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    return $result->fetch_assoc();
}

function addProduct($name,  $image)
{
    global $conn;
    $sql = "INSERT INTO products (name, image_path,category_id) VALUES ('$name', '$image',3)";
    $conn->query($sql);
}

function updateProduct($id, $name, $description, $price)
{
    global $conn;
    $sql = "UPDATE products SET name='$name' WHERE id=$id";
    $conn->query($sql);
}

function deleteProduct($id)
{
    global $conn;
    $sql = "DELETE FROM products WHERE id=$id";
    $conn->query($sql);
}

function uploadImage()
{
    $uploadsDir = 'assets/images/product/';
 //  $uploadsDir = 'uploads/';
    
    if (!file_exists($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }
    $tmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];

    $imagePath = $uploadsDir . $imageName;

    move_uploaded_file($tmpName, $imagePath);

    return $imageName;
}

function deleteImage($filename)
{
     $uploadsDir = 'assets/images/product/';
    $imagePath = $uploadsDir . $filename;

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'delete' && isset($_GET['id'])) {
        $idToDelete = $_GET['id'];
        deleteProduct($idToDelete);
        // After deleting, redirect back to admin.php
        header('Location: admin.php');
        exit();
    }
}