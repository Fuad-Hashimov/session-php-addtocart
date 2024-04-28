<?php
session_start();
include "./inc/header.php";
include "./Controller/CartClass.php";
$remove = new Cart();
$remove -> removeOneItem();
$remove -> removeAll();
?>

<div class="container mt-3">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                Home
            </a>
            <div>
                <?php if (isset($_SESSION['cart'])) : ?>
                    <h1 class="text-danger"><?php echo  "backet is " . count($_SESSION['cart']) ?></h1>
                <?php else : echo "backet 0" ?>
                    <h1></h1>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <h2>Your Cart</h2>
    <a href="checkout.php?empty=1" class="btn btn-danger mb-2 mt-2 empty">Delete All</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Count</th>
                <th>Price</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION['cart'])) : ?>
                <?php foreach ($_SESSION['cart'] as $key => $value) : ?>
                    <tr>
                        <td><img src=<?php echo "./public/images/" . $value['img'] ?> width="50" height="50" alt=""></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['quantity'] ?></td>
                        <td><?php echo $value['price'] * $value['quantity'] . " azn" ?></td>
                        <td>
                            <a href="checkout.php?remove=<?php echo $value['id'] ?>" class="btn btn-success">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>