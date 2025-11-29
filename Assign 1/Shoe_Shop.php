<?php

//Variables
$storeName = "Luella Shoe Shop";
$bgColor = "#f4f4f9";

// arrays
$shoes = [
    ["name" => "Gucci Sneakers", "price" => 10000, "sale" => 8000, "sizes" => [35, 36, 37, 41, 42]],
    ["name" => "White Sneakers", "price" => 3000, "sale" => 1999, "sizes" => [36, 37, 38, 39]],
    ["name" => "Old School", "price" => 2500, "sale" => 1500, "sizes" => [35,38, 39, 42, 43, 44]],
    ["name" => "Air Force 1", "price" => 3500, "sale" => 2999, "sizes" => [36, 40, 41, 42]],
    ["name" => "Agility Red Fire", "price" => 4000, "sale" => 3450, "sizes" => [37, 38, 39, 40, 41]]
];

// NOW we can count the products
$totalProducts = count($shoes);

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $storeName; ?></title>
</head>
<body>

<h1><?php echo $storeName; ?></h1>
<p style="text-align:center;">
    
    <!-- Expressions -->
    <?php echo "Shoes that bring comfort and make you feel like you’re walking on clouds."; ?>
    <?php echo "We currently offer " . $totalProducts . " shoe products!"; ?>
</p>

<table>
    <tr>
        <th>Shoe Model</th>
        <th>Regular Price (PHP)</th>
        <th>Updated Sale Price</th>
        <th>Sizes Available</th>
        <th>Status</th>
    </tr>

    <?php
    foreach ($shoes as $item) {

        //Variables & Operators
        $status = ($item["sale"] < $item["price"]) 
                  ? "On Sale!" 
                  : "Regular Price";

        // Variables and Expressions
        $sizesList = implode(", ", $item["sizes"]);

        echo "<tr>";
        echo "<td>" . $item["name"] . "</td>";
        echo "<td>" . $item["price"] . "</td>";
        echo "<td>" . $item["sale"] . "</td>";
        echo "<td>" . $sizesList . "</td>";
        echo "<td>" . $status . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<div class="footer">
    <p>Thank you for visiting Luella Shop.</p>
</div>

</body>

<style>
/* CSS PART *//
body {
    background: linear-gradient(120deg, #e0eafc, #cfdef3); 
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    margin: 0;
    padding: 20px;
}

.header-container {
    max-width: 900px;
    margin: 30px auto;
    padding: 30px 20px;
    text-align: center;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}
h1 {
    font-size: 42px;
    text-align: center;
    color: #222;
    margin-bottom: 10px;
    letter-spacing: 1.5px;
}

.subtitle {
    font-size: 18px;
    color: #555;
    line-height: 1.6;
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
    padding: 5px 0;          
    text-align: center;
    background-color: #333;  
    color: #fff;
    font-style: normal;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1); 
}

</style>

</html>
