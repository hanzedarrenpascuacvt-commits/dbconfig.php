<?php
require_once 'core/dbConfig.php';

$query = "UPDATE grocery_items
          SET price = ?, stock_quantity = ?
          WHERE item_id = 1";
$stmt = $pdo->prepare($query);
$executeQuery = $stmt->execute([18.00, 250]);

if ($executeQuery) {
    echo "Update successful!";
} else {
    echo "Query failed";
}
?>
