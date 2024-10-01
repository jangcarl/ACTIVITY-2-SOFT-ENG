<?php  
$menu = [
    ['name' => 'Burger', 'price' => 50],
    ['name' => 'Fries', 'price' => 70],
    ['name' => 'Steak', 'price' => 150],
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <title>Canteen Prices</title>
</head>
<body>
    <h1>Menu</h1>

    <table style="width:25%">
        <tr>
            <th><b>Order</b></th>
            <th><b>Amount</b></th>
        </tr>
        <?php foreach ($menu as $item) : ?>
            <tr>
                <td><?= htmlspecialchars($item['name']); ?></td>
                <td><?= htmlspecialchars($item['price']); ?> PHP</td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <form method="POST" action="Menu_handleForm.php">
        <p>
            <label for="order">Choose your order: </label>
            <select name="order" id="order">
                <option value="">Select an option</option>
                <?php foreach ($menu as $item) : ?>
                    <option value="<?= htmlspecialchars($item['name']); ?>"><?= htmlspecialchars($item['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            Quantity:
            <input type="text" name="quantity">
        </p>
        <p>
            Cash:
            <input type="text" name="cash">
        </p>
        <p>
            <input type="submit" value="Submit" name="Submit">
        </p>
    </form>
</body>
</html>
