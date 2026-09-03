<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Inventory Management</title>
    <link rel="stylesheet" href="css/style.css?v=3">
</head>
<body class="inventory-page">

    <div class="inventory-container">
        <!-- Title -->
        <h1 class="inventory-title">Inventory / Stock Management</h1>

        <!-- Search Product & Add Product Bar -->
        <div class="inventory-top-bar">
            <span class="search-placeholder">Search Product</span>
            <button type="button" class="add-product-btn">+ Add Product</button>
        </div>

        <!-- Inventory Items List -->
        <div class="inventory-list">
            
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <!-- Inventory Item Card -->
            <div class="inventory-card">
                <div class="inventory-info">
                    <span class="item-name">Iced Coffee</span>
                    <span class="item-category">Beverage</span>
                    <span class="item-stats">20 &nbsp;&nbsp; 5 &nbsp;&nbsp; 15</span>
                </div>
                <div class="inventory-action">
                    <button type="button" class="edit-item-btn">Edit</button>
                </div>
            </div>
            <?php endfor; ?>

        </div>
    </div>

</body>
</html>