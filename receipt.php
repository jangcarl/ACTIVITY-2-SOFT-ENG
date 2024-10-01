<?php
session_start(); 

if (!isset($_SESSION['order'], $_SESSION['quantity'], $_SESSION['price'], $_SESSION['cash'], $_SESSION['totalCost'])) {
    header('Location: Menu_index.php');
    exit();
}

$order = $_SESSION['order'];
$quantity = $_SESSION['quantity'];
$price = $_SESSION['price'];
$cash = $_SESSION['cash'];
$totalCost = $_SESSION['totalCost'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .myDiv {
            border: dotted;
            border-width: 100px;
            padding: 5px;
            margin: 20px;
        }
        .Receipt {
            text-align: center;
        }
        .insufficient {
            border: dotted;
            padding: 5px;
            margin: 20px;
            border-color: red;
        }
    </style>
    <title>Receipt</title>
</head>
<body>
    <?php if ($cash < $totalCost) : ?>
        <h3 class="insufficient">Sorry, balance not enough! You are short by <b><?= htmlspecialchars($totalCost - $cash); ?> PHP</b>.</p>
    <?php else : ?>
        <div class="myDiv">
        <h1 class="Receipt">RECEIPT</h1>
        <h1>Total Price: <?= htmlspecialchars($totalCost); ?></h1>
        <h1>You Paid: <?= htmlspecialchars($cash); ?></h1>
        <h1>CHANGE: <b><?= htmlspecialchars($cash - $totalCost); ?></b></h1>
        <h1><i><?php echo date("m/d/Y") .' '. date("h:i:s a")?></i></h1>
        </div>
    <?php endif; ?>
</body>
</html>

<?php

session_unset();
session_destroy();
