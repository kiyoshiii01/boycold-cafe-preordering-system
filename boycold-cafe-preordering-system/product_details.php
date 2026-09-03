<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Product Details</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="product-page">

    <div class="product-details-frame">
        
        <!-- Back to Menu Link -->
        <div class="back-link-container">
            <a href="home.php" class="back-link">← Back to Menu</a>
        </div>

        <!-- Main Content Grid -->
        <div class="product-content-grid">
            
            <!-- Left: Product Image Box -->
            <div class="product-image-box">
                <span>[ PRODUCT IMAGE ]</span>
            </div>

            <!-- Right: Product Info & Options -->
            <div class="product-info-box">
                <h1 class="product-name-title">Product Name</h1>
                <div class="product-price">₱ 00.00</div>
                <p class="product-desc">Description / ingredients placeholder</p>

                <!-- Size Selection -->
                <div class="option-group">
                    <label class="option-label">Size</label>
                    <div class="size-buttons">
                        <button type="button" class="size-btn active">Regular</button>
                        <button type="button" class="size-btn">Large</button>
                    </div>
                </div>

                <!-- Quantity Selector -->
                <div class="option-group">
                    <label class="option-label">Quantity</label>
                    <div class="quantity-selector">
                        <button type="button" class="qty-btn">-</button>
                        <span class="qty-number">1</span>
                        <button type="button" class="qty-btn">+</button>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <div class="action-container">
                    <button type="button" class="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>

        </div>

    </div>

</body>
</html>