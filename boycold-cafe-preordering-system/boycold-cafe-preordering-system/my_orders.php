<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mock orders array (Pwede mong ikonekta sa database sa hinaharap)
$orders = [
    [
        'order_no' => 'BC-0001',
        'price' => 300.00,
        'pickup_time' => '10:30 AM',
        'status_steps' => 'Placed → Confirmed → Preparing → Ready',
        'has_button' => false
    ],
    [
        'order_no' => 'BC-0002',
        'price' => 180.00,
        'pickup_time' => '09:00 AM',
        'status_text' => 'Status: Ready for Pickup',
        'has_button' => true
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - My Orders</title>
    <style>
        body.my-orders-page {
            margin: 0;
            padding: 40px;
            min-height: 100vh;
            box-sizing: border-box;

            display: flex;
            justify-content: center;

            font-family: Arial, sans-serif;

            background:
                linear-gradient(rgba(30, 20, 15, 0.48), rgba(30, 20, 15, 0.48)),
                url('images/bg.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .orders-container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .orders-title {
            color: white;
            font-size: 2.2rem;
            margin: 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .orders-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order-item-card {
            background-color: #6B4F3F;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            flex-direction: column;
            gap: 12px;
            color: white;
        }

        .order-item-card.with-button {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .order-info-left {
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex-grow: 1;
        }

        .order-card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            font-size: 1.1rem;
            color: white;
        }

        .order-card-bottom {
            font-size: 0.95rem;
            font-weight: normal;
            color: white;
            opacity: 0.95;
        }

        .order-status-text {
            color: white;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 3px 8px;
            border-radius: 4px;
        }

        .view-details-btn {
            background-color: #5a4234;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: background-color 0.2s, opacity 0.2s;
        }

        .view-details-btn:hover {
            opacity: 0.9;
            background-color: #4A3525;
        }

        @media (max-width: 768px) {
            .order-item-card.with-button {
                flex-direction: column;
                align-items: flex-start;
            }
            .order-info-right {
                width: 100%;
                text-align: right;
            }
            body.my-orders-page {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="my-orders-page">

    <div class="orders-container">
        <div class="orders-header">
            <h1 class="orders-title">My Orders</h1>
            <a href="home.php" class="back-link">← Back to Menu</a>
        </div>

        <div class="orders-list">
            <?php foreach ($orders as $order): ?>
                <?php if (!$order['has_button']): ?>
                    <!-- Order Card Standard -->
                    <div class="order-item-card">
                        <div class="order-card-top">
                            <span class="order-num"><?php echo htmlspecialchars($order['order_no']); ?></span>
                            <span class="order-price">₱<?php echo number_format($order['price'], 2); ?></span>
                            <span class="order-pickup-info">Pickup <?php echo htmlspecialchars($order['pickup_time']); ?></span>
                        </div>
                        <div class="order-card-bottom">
                            <span class="order-steps"><?php echo htmlspecialchars($order['status_steps']); ?></span>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Order Card With Button -->
                    <div class="order-item-card with-button">
                        <div class="order-info-left">
                            <div class="order-card-top">
                                <span class="order-num"><?php echo htmlspecialchars($order['order_no']); ?></span>
                                <span class="order-price">₱<?php echo number_format($order['price'], 2); ?></span>
                            </div>
                            <div class="order-card-bottom">
                                <span class="order-status-text"><?php echo htmlspecialchars($order['status_text']); ?></span>
                            </div>
                        </div>
                        <div class="order-info-right">
                            <button type="button" class="view-details-btn" onclick="window.location.href='order_details.php?id=<?php echo $order['order_no']; ?>'">View Details</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>