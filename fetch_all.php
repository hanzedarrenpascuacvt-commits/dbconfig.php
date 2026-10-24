<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Grocery Items</title>
</head>
<body>

<?php
// Selecting only the item with an item_id of 5
$query = "SELECT * FROM grocery_items WHERE item_id = ?";

// Prepare the SQL statement
$stmt = $pdo->prepare($query);

// Execute the prepared statement; 5 replaces the ? placeholder
if ($stmt->execute([5])) {
    // fetch() gets ONLY ONE row from the result set
    $item = $stmt->fetch();

    // Show the row using print_r() inside <pre>
    echo "<pre>";
    print_r($item);
    echo "</pre>";
} else {
    echo "Query failed";
}
?>

<!-- Show the same row in an HTML table -->
<table border="1" cellpadding="6">
  <tr>
    <th>Item ID</th>
    <th>Item Name</th>
    <th>Brand</th>
    <th>Category</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Date Added</th>
  </tr>
  <tr>
    <td><?php echo $item['item_id']; ?></td>
    <td><?php echo $item['item_name']; ?></td>
    <td><?php echo $item['brand_name']; ?></td>
    <td><?php echo $item['category']; ?></td>
    <td><?php echo $item['price']; ?></td>
    <td><?php echo $item['stock_quantity']; ?></td>
    <td><?php echo $item['date_added']; ?></td>
  </tr>
</table>
<p>Test: <?php echo $item['item_name']; ?></p>

</body>
</html>