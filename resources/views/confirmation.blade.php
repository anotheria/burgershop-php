<?php
/**
 * @var int $totalPrice
 * @var \app\Services\ShoppableItem[] $items
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Burger Shop :: Order Confirmation</title>
    <link rel="stylesheet" href="css/common.css"/>
    <script src="js/general.js"></script>
    <!--[if IE]>
    <script>
        document.createElement('header');
        document.createElement('nav');
        document.createElement('section');
        document.createElement('article');
        document.createElement('aside');
        document.createElement('footer');
    </script>
    <![endif]-->

</head>

<body class="inner_bg">

<header class="main">
    <div class="logo_line"></div>
    <img src="img/logo.png"/>
</header>

<div class="lightbox order-box" style="display: block;">
    <div class="oder_now">
        <p>You ordered</p>
        <p class="order-text">
            <?php foreach ($items as $item): ?>
                <?=$item->getName()?><br/>
            <?php endforeach;?>
            <br/>
            Total: <?=$totalPrice?> Eur.
            <br/><br/>
            Your meal will be ready for pickup in our shop
            <br/>
            in Timbuktu in 15 Minutes, you have to pick it up
            <br/>
            in 30 Minutes, or we give it to the dogs.
            <br/>
            Enjoy your meal.

        </p>
    </div>
</div>




</body>
</html>
