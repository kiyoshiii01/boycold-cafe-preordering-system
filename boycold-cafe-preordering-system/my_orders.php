<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
        * {
            box-sizing: border-box;
        }

        body.my-orders-page {
            margin: 0;
            padding: 40px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                linear-gradient(rgba(30, 20, 15, 0.65), rgba(30, 20, 15, 0.65)),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
            font-size: 2rem;
            margin: 0;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-link {
            color: #f3e5d8;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: white;
            text-decoration: underline;
        }

        .orders-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order-item-card {
            background: rgba(45, 30, 22, 0.85);
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            gap: 15px;
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
            font-weight: 700;
            font-size: 1.1rem;
            color: white;
        }

        .order-num {
            color: white;
        }

        .order-price {
            color: #f3e5d8;
        }

        .order-pickup-info {
            font-size: 0.95rem;
            color: #e0d0c0;
            font-weight: 600;
        }

        .order-card-bottom {
            font-size: 0.95rem;
            color: #e0d0c0;
        }

        .order-steps {
            color: #e0d0c0;
        }

        .order-status-text {
            color: white;
            font-weight: 600;
            background-color: rgba(255, 255, 255, 0.12);
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.95rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: inline-block;
        }

        .view-details-btn {
            background: linear-gradient(135deg, #f3e5d8 0%, #e2d2c3 100%);
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            color: #5c3a21;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .view-details-btn:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            .order-item-card.with-button {
                flex-direction: column;
                align-items: stretch;
                gap: 20px;
            }
            .order-info-right {
                width: 100%;
                text-align: right;
            }
            .view-details-btn {
                width: 100%;
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
            <a href="home.php" class="back-link">&larr; Back to Menu</a>
        </div>

        <div class="orders-list">
            <?php foreach ($orders as $order): ?>
                <?php if (!$order['has_button']): ?>
                    <!-- Order Card Standard -->
                    <div class="order-item-card">
                        <div class="order-card-top">
                            <span class="order-num"><?php echo htmlspecialchars($order['order_no']); ?></span>
                            <span class="order-price">&#8369;<?php echo number_format($order['price'], 2); ?></span>
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
                                <span class="order-price">&#8369;<?php echo number_format($order['price'], 2); ?></span>
                                <span class="order-pickup-info">Pickup <?php echo htmlspecialchars($order['pickup_time']); ?></span>
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