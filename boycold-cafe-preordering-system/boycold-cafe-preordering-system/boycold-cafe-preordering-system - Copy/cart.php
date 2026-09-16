<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Cart & Checkout</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body class="cart-page">

    <div class="cart-container">
        <!-- Title & Back Link -->
        <div class="cart-header-section">
            <h1 class="cart-title">Cart & Checkout</h1>
            <a href="home.php" class="back-to-menu-link">← Back to Menu</a>
        </div>

        <!-- Main Cart Grid Layout -->
        <div class="cart-grid">
            
            <!-- Left Side: Order Summary Box -->
            <div class="order-summary-box">
                <div class="cart-items-list">
                    <div class="cart-item-row">
                        <span class="item-name">Product 1</span>
                        <span class="item-qty">Qty 1</span>
                        <span class="item-price">₱120</span>
                    </div>
                    <div class="cart-item-row">
                        <span class="item-name">Product 2</span>
                        <span class="item-qty">Qty 2</span>
                        <span class="item-price">₱180</span>
                    </div>
                </div>
                <div class="cart-subtotal">
                    Subtotal: ₱300
                </div>
            </div>

            <!-- Right Side: Pickup & Payment Options -->
            <div class="checkout-options-box">
                <div class="form-group-cart">
                    <label>Pickup Date & Time</label>
                    <input type="text" placeholder="Select date & time" class="cart-input">
                </div>

                <div class="form-group-cart">
                    <label>Payment Method</label>
                    <div class="payment-method-display">Cash on Pickup</div>
                </div>
            </div>

        </div>

        <!-- Bottom: Place Order Button (Ginawa nating clickable papuntang order_confirm.php) -->
        <div class="place-order-container">
            <button type="button" class="place-order-btn" onclick="window.location.href='order_confirm.php'">Place Order</button>
        </div>
    </div>

</body>
</html>