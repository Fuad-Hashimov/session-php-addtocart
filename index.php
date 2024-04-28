<?php
session_start();
include "./inc/header.php";
include "./Controller/CartClass.php";
include "./db/mockData.php";
$addToCart = new Cart();
$addToCart -> addToCart();
?>

<div class="container">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="checkout.php">
                CheckOut page
            </a>
            <div>
                <?php if (isset($_SESSION['cart'])) : ?>
                    <h1 class="text-danger"><?php echo  "sebetde  " . count($_SESSION['cart']) . " cesid mehsul var" ?></h1>
                <?php else : echo "backet 0" ?>
                    <h1></h1>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <div class="row">
        <?php foreach ($mockData as $key => $value) : ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" width="300" height="250" src=<?php echo "./public/images/" . $value['img'] ?> alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['name'] ?></h5>
                        <p class="card-text"><?php echo $value['price'] . " - azn" ?></p>
                        <?php if (isset($_SESSION['cart'][$value['id']])) : ?>
                            <p>Sebete : <?php echo $_SESSION['cart'][$value['id']]['quantity'] . " eded elave etdiniz";  ?></p>
                        <?php endif ?>
                        <form action="index.php" method="post">
                            <input type="number" hidden name="quantity" min="1" max=<?php echo $value['stock'] ?> value="1" placeholder="Quantity" required>
                            <input type="hidden" name="id" value=<?php echo $value['id'] ?>>
                            <input type="hidden" name="img" value=<?php echo $value['img'] ?>>
                            <input type="hidden" name="name" value=<?php echo $value['name'] ?>>
                            <input type="hidden" name="price" value=<?php echo $value['price'] ?>>
                            <button class="btn btn-primary" type="submit" name="add-cart">Add To Cart</button>
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php include "./inc/footer.php"; ?>