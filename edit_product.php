<?php

include 'product_functions.php';

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

$product = getProductById($_GET['id']);

if (!$product) {
    header('Location: admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Check if a new image is uploaded
    if ($_FILES['image']['size'] > 0) {
        // Upload image
        $image = uploadImage();
        // Update product with new image
        updateProductWithImage($id, $name, $description, $price, $image);
    } else {
        // Update product without changing the image
        updateProduct($id, $name, $description, $price);
    }

    header('Location: admin.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Include jQuery using CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/css/bootstrap.min.css">

    <style>
        /* Custom styling for pagination */
        .dataTables_paginate {
            text-align: center;
        }

        .dataTables_paginate a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            color: #333;
            border: 1px solid #ccc;
            text-decoration: none;
            cursor: pointer;
        }

        .dataTables_paginate a.current {
            background-color: #007bff;
            color: #fff;
        }

        .dataTables_paginate a:hover {
            background-color: #eee;
        }

        /* Additional style for form */
        body {
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        label {
            margin-top: 10px;
            display: block;
        }

        input,
        button {
            margin-top: 5px;
        }
    </style>
</head>
<body>
<body>

<h2>Edit Product</h2>

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br>

    <!--<label>Description:</label>-->
    <!--<textarea name="description" required><?= $product['description'] ?></textarea><br>-->

    <!--<label>Price:</label>-->
    <!--<input type="number" name="price" value="<?= $product['price'] ?>" required><br>-->

    <label>Image:</label>
    <input type="file" name="image" accept="image/*"><br>
    <small>Leave it empty if you don't want to change the image.</small><br>

    <button type="submit" class="btn btn-primary">Update Product</button>
    <a href="admin.php" class="btn btn-secondary">Back</a>
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
