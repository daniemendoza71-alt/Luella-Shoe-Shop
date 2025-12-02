<?php
declare(strict_types=1); 

//Variables
$storeName = "Luella Shoe Shop";
$bgColor = "#f4f4f9";

// arrays
$shoes = [
    ["name" => "Gucci Sneakers", "price" => 10000, "sale" => 8000, "sizes" => [35, 36, 37, 41, 42]], 
    ["name" => "White Sneakers", "price" => 3000, "sale" => 1999, "sizes" => [36, 37, 38, 39]], 
    ["name" => "Old School", "price" => 2500, "sale" => 1500, "sizes" => [35,38, 39, 42, 43, 44]], 
    ["name" => "Air Force 1", "price" => 3500, "sale" => 2999, "sizes" => [36, 40, 41, 42]], 
    ["name" => "Agility Red Fire", "price" => 4000, "sale" => 3450, "sizes" => [37, 38, 39, 40, 41]], 
];

$totalProducts = count($shoes);

//New Added in the code//
$taxRate = 12; // global tax rate in percent 


function get_reorder_message(int $stock): string 
{
    return ($stock < 10) ? "Yes" : "No"; 
} 

function get_total_value(float $price, int $quantity): float
{ 
    return $price * $quantity; 
} 
function get_tax_due(float $price, int $quantity, int $tax = 0): float 
{ 
    return ($price * $quantity) * ($tax / 100); 
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $storeName; ?></title>
</head>
<body style="background-color: <?php echo $bgColor; ?>;">

<h1><?php echo $storeName; ?></h1>
<p style="text-align:center;">
    <?php echo "Shoes that bring comfort and make you feel like you’re walking on clouds."; ?><br>
    <?php echo "We currently offer " . $totalProducts . " shoe products!"; ?>
</p>

<table>
    <tr>
        <th>Shoe Model</th>
        <th>Regular Price (PHP)</th>
        <th>Updated Sale Price</th>
        <th>Sizes Available</th>
        <th>Status</th>
        <th>Discount Message</th>
    </tr>
    <?php foreach ($shoes as $item) {
        $status = ($item["sale"] < $item["price"]) ? "On Sale!" : "Regular Price";
        if ($item["sale"] < 3000) {
            $discountMsg = "Great deal!";
        } elseif ($item["sale"] < $item["price"]) {
            $discountMsg = "Limited sale!";
        } else {
            $discountMsg = "-";
        }
        $sizesList = implode(", ", $item["sizes"]);
        echo "<tr>";
        echo "<td>" . $item["name"] . "</td>";
        echo "<td>" . $item["price"] . "</td>";
        echo "<td>" . $item["sale"] . "</td>";
        echo "<td>" . $sizesList . "</td>";
        echo "<td>" . $status . "</td>";
        echo "<td>" . $discountMsg . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<!--New Stock Control Table-->
<h2 style="text-align:center; margin-top:50px;">Stock Control</h2>
<table>
    <tr>
        <th>Product Name</th>
        <th>Stock Level</th>
        <th>Reorder?</th>
        <th>Total Value (PHP)</th>
        <th>Tax Due (Peso (PHP))</th>
    </tr>
    <?php 

    //Loop  
    for ($i = 0; $i < 5; $i++) { 
        $product = $shoes[$i]; 
        $name = $product["name"]; 
        $price = $product["sale"]; 
        $stock = rand(5, 25);
        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$stock}</td>";
        echo "<td>" . get_reorder_message($stock) . "</td>"; 
        echo "<td>" . number_format(get_total_value($price, $stock), 2) . "</td>"; 
        echo "<td>" . number_format(get_tax_due($price, $stock, $taxRate), 2) . "</td>"; 
        echo "</tr>";
    } 
    ?>
</table>

<div class="footer">
    <p>Thank you for visiting Luella Shop.</p>
</div>

</body>
<style>
body {
    background: linear-gradient(120deg, #e0eafc, #cfdef3);
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    margin: 0;
    padding: 20px;
}
h1 {
    font-size: 42px;
    text-align: center;
    color: #222;
    margin-bottom: 10px;
    letter-spacing: 1.5px;
}
table {
    width: 90%;
    margin: 40px auto;
    border-collapse: collapse;
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
th, td {
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}
th {
    background-color: #222;
    color: #fff;
}
tr:hover {
    background-color: #f1f1f1;
    transition: 0.3s;
}
.footer {
    width: 100%;
    margin: 0;
    padding: 20px 0;
    text-align: center;
    background-color: #333;
    color: #fff;
    font-style: normal;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
}
</style>
</html>
