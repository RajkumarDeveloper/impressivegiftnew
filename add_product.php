<?php

include 'product_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
     $image = uploadImage();
    // Add product
    addProduct($name,  $image);

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

    <h2>Add Product</h2>

    <form method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <!--<label for="description">Description:</label>-->
        <!--<textarea id="description" name="description" required></textarea>-->

        <!--<label for="price">Price:</label>-->
        <!--<input type="number" id="price" name="price" required>-->

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit" class="btn btn-primary">Add Product</button>
        
        <a href="admin.php" class="btn btn-secondary">Back</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
