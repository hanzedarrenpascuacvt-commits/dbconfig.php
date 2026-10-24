<?php
require_once 'core/dbConfig.php';

$query = "INSERT INTO grocery_items (item_name, brand_name, category, price, stock_quantity, date_added)
          VALUES (?,?,?,?,?,?)";
$stmt = $pdo->prepare($query);
$executeQuery = $stmt->execute(["Evaporated Milk 410g", "Alaska", "Dairy", 45.00, 80, "2026-10-17"]);

if ($executeQuery) {
    echo "Query successful!";
} else {
    echo "Query failed";
}
?>
