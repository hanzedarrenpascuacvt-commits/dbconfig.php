<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Grocery Items</title>
</head>
<body>

<h2>Items and Average Price per Category</h2>
<?php
// SQL query: count the items and get the average price of each category
$query = "SELECT category,
                 COUNT(*) AS itemCount,
                 ROUND(AVG(price), 2) AS avgPrice
          FROM grocery_items
          GROUP BY category
          HAVING COUNT(*) >= 2
          ORDER BY itemCount DESC, category ASC";

// Prepare and execute the query
$stmt = $pdo->prepare($query);
$executeQuery = $stmt->execute();

if ($executeQuery) {
    // Store all rows of the result set in a variable
    $rows = $stmt->fetchAll();
} else {
    echo "Query failed";
}
?>

<!-- Render the result set as an HTML table -->
<table border="1" cellpadding="6">
  <tr>
    <th>Category</th>
    <th>Number of Items</th>
    <th>Average Price</th>
  </tr>
  <?php foreach ($rows as $row) { ?>
  <tr>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['itemCount']; ?></td>
    <td><?php echo $row['avgPrice']; ?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>