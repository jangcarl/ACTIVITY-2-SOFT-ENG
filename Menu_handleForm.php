<?php
session_start(); // Start the session to store form data

$menu = [
    ['name' => 'Burger', 'price' => 50],
    ['name' => 'Fries', 'price' => 70],
    ['name' => 'Steak', 'price' => 150],
];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order = isset($_POST['order']) && $_POST['order'] != "" ? $_POST['order'] : null;
    $quantity = isset($_POST['quantity']) && trim($_POST['quantity']) !== "" ? floatval($_POST['quantity']) : 0;
    $cash = isset($_POST['cash']) && trim($_POST['cash']) !== "" ? floatval($_POST['cash']) : 0;

    if (!$order || $quantity <= 0 || $cash <= 0) {
        header('Location: Menu_index.php?error=invalid'); // Redirect back if data is invalid
        exit();
    } else {
        // Store order details in session to use on the receipt page
        foreach ($menu as $item) {
            if ($item['name'] === $order) {
                $_SESSION['order'] = $order;
                $_SESSION['quantity'] = $quantity;
                $_SESSION['price'] = $item['price'];
                $_SESSION['cash'] = $cash;
                $_SESSION['totalCost'] = $item['price'] * $quantity;
                break;
            }
        }
        header('Location: Menu_receipt.php'); // Redirect to Menu_receipt.php
        exit();
    }
}
