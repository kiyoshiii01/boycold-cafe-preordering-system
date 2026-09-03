<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - My Orders</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body class="my-orders-page">

    <div class="orders-container">
        <!-- Header & Back Link -->
        <div class="orders-header">
            <h1 class="orders-title">My Orders</h1>
            <a href="home.php" class="back-link">← Back to Menu</a>
        </div>

        <!-- Orders List -->
        <div class="orders-list">
            
            <!-- Order Card 1 -->
            <div class="order-item-card">
                <div class="order-card-top">
                    <span class="order-num">Order #BC-0001</span>
                    <span class="order-price">₱300</span>
                    <span class="order-pickup-info">Pickup 10:30 AM</span>
                </div>
                <div class="order-card-bottom">
                    <span class="order-steps">Placed → Confirmed → Preparing → Ready</span>
                </div>
            </div>

            <!-- Order Card 2 -->
            <div class="order-item-card with-button">
                <div class="order-info-left">
                    <div class="order-card-top">
                        <span class="order-num">Order #BC-0002</span>
                        <span class="order-price">₱180</span>
                    </div>
                    <div class="order-card-bottom">
                        <span class="order-status-text">Status: Ready for Pickup</span>
                    </div>
                </div>
                <div class="order-info-right">
                    <button type="button" class="view-details-btn">View Details</button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>