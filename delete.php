<?php
require_once 'core/dbConfig.php';

$query = "DELETE FROM grocery_items WHERE item_id = 101";
$stmt = $pdo->prepare($query);
$executeQuery = $stmt->execute();

if ($executeQuery) {
    echo "Deletion successful!";
} else {
    echo "Query failed";
}
?>
