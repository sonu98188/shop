<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Management</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>

    <style>

        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body
        {
            background: #f1f5f9;
            font-family: sans-serif;
        }

        .main-box
        {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.08);
        }

        .table thead
        {
            background: #0d6efd;
            color: white;
        }

        .table tbody tr
        {
            vertical-align: middle;
        }

        .product-img
        {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #dee2e6;
        }

        .edit-btn
        {
            color: #198754;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        .edit-btn:hover
        {
            color: #0f5132;
            transform: scale(1.1);
        }

        .del-btn
        {
            color: #dc3545;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        .del-btn:hover
        {
            color: #842029;
            transform: scale(1.1);
        }

        h2
        {
            font-weight: bold;
            color: #0d6efd;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="main-box">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>
                <i class="fa fa-box"></i>
                Product Management
            </h2>

          

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle text-center">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Quantity</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>

                <?php

                    require("../php/db.php");

                    $get_cat = $db->query("SELECT * FROM addproduct");

                    while($aa = $get_cat->fetch_assoc())
                    {
                        echo "

                        <tr>
                        
                            <td>".$aa['id']."</td>

                            <td>".$aa['category_name']."</td>

                            <td>".$aa['product_name']."</td>

                            <td>
                                <img 
                                    src='./managment/upload/".$aa['product_image']."'
                                    class='product-img'
                                    onerror=\"this.src='no-image.png'\"
                                >
                            </td>

                            <td>
                                ₹ ".$aa['amount']."
                            </td>

                            <td>
                                ".$aa['quantity']."
                            </td>

                            <td>
                                <i class='fa fa-pen edit-btn' id='".$aa['id']."'></i>
                            </td>

                            <td>
                                <i class='fa fa-trash del-btn' id='".$aa['id']."'></i>
                            </td>

                        </tr>

                        ";
                    }

                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>
