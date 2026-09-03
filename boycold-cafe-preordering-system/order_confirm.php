<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Order Confirmation</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body class="confirm-page">

    <div class="confirm-container">
        <!-- Header Text -->
        <div class="confirm-header">
            <h1 class="confirm-title">Order Confirmed!</h1>
            <p class="confirm-subtitle">Thank you for ordering from Boycold Cafe.</p>
        </div>

        <!-- Order Details Card -->
        <div class="order-card-box">
            <div class="order-id">Order #BC-0001</div>
            <div class="order-pickup">Pickup: August 22, 2026 • 10:30 AM</div>
            <div class="order-status">Status: Preparing</div>
        </div>

        <!-- Action Button -->
        <div class="confirm-action-container">
            <button type="button" class="view-orders-btn" onclick="window.location.href='my_orders.php'">View My Orders</button>
        </div>
    </div>

</body>
</html>