<?php
class Cart
{
    function addToCart(){
        if (isset($_POST['add-cart'])) {
            $productId = $_POST['id'];
            $quantity = $_POST['quantity'];
            if (empty($_SESSION['cart']) || !isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] = array(
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'quantity' => $quantity,
                    'img' => $_POST['img']
                );
            } else {
                $_SESSION['cart'][$productId]['quantity'] += $quantity;
            }
        }
    }

    function removeOneItem(){
        if (isset($_GET['remove'])) {
            $id = $_GET['remove'];
            foreach ($_SESSION['cart'] as $key => $val) {
                if ($id == $val['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }

    function removeAll(){
        if (isset($_GET['empty'])) {
            unset($_SESSION['cart']);
        }
    }
}
