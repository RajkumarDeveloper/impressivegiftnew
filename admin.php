<?php
   $basePath = 'assets/images/product/';
   include 'product_functions.php';

$products = getProducts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
<!-- Include jQuery using CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- DataTables JS CDN -->
<!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>-->
    <!-- Bootstrap CSS CDN -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.3/dist/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/css/bootstrap.min.css">
    <!-- DataTables CSS CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    </style>
</head>
<body>

<div class="container mt-4">

    <h2>Admin Panel</h2>

    <a class="btn btn-primary mb-3" href="add_product.php">Add Product</a>

    <table id="productTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!--<th>Description</th>-->
                <!--<th>Price</th>-->
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <!--<td><?= $product['description'] ?></td>-->
                    <!--<td><?= $product['price'] ?></td>-->
                    <td><img src="<?= $basePath.'/'.$product['image_path'] ?>" alt="Product Image" width="150"></td>
                    <td>
                        <a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="product_functions.php?action=delete&id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#productTable').DataTable();
    });
</script>
<!-- Bootstrap JS and Popper.js CDN (required for Bootstrap components) -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.3/dist/js/bootstrap.bundle.min.js"></script>-->




</body>
</html>

