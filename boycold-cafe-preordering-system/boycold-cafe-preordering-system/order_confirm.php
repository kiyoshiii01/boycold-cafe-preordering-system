<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$order_id = "BC-0001"; 
// Dynamic pickup time (halimbawa: kasalukuyang petsa o pwede ring i-adjust kung kinakailangan)
$pickup_datetime = date('F d, Y • h:i A');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Order Confirmation</title>
    <style>
        body.confirm-page {
            margin: 0;
            padding: 40px;
            min-height: 100vh;
            box-sizing: border-box;

            display: flex;
            justify-content: center;
            align-items: center;

            font-family: Arial, sans-serif;

            background:
                linear-gradient(rgba(30, 20, 15, 0.48), rgba(30, 20, 15, 0.48)),
                url('images/bg.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .confirm-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .confirm-header {
            margin-bottom: 25px;
        }

        .confirm-title {
            color: white;
            font-size: 2.5rem;
            margin: 0 0 10px 0;
            font-weight: bold;
            text-shadow: 0 2px 5px rgba(0,0,0,0.4);
        }

        .confirm-subtitle {
            color: white;
            font-size: 1.1rem;
            margin: 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
            opacity: 0.95;
        }

        .order-card-box {
            background-color: #6B4F3F;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            flex-direction: column;
            gap: 15px;
            color: white;
            margin-bottom: 25px;
            text-align: left;
        }

        .order-id {
            font-size: 1.3rem;
            font-weight: bold;
            color: white;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 10px;
        }

        .order-pickup, .order-status {
            font-size: 1.1rem;
            font-weight: normal;
            color: white;
        }

        .order-status span {
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 3px 10px;
            border-radius: 4px;
        }

        .confirm-action-container {
            width: 100%;
        }

        .view-orders-btn {
            width: 100%;
            background-color: #6B4F3F;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            text-align: center;
            transition: background-color 0.2s, opacity 0.2s;
        }

        .view-orders-btn:hover {
            background-color: #5a4234;
            opacity: 0.95;
        }

        @media (max-width: 480px) {
            body.confirm-page {
                padding: 20px;
            }
            .confirm-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body class="confirm-page">

    <div class="confirm-container">
        <div class="confirm-header">
            <h1 class="confirm-title">Order Confirmed!</h1>
            <p class="confirm-subtitle">Thank you for ordering from Boycold Cafe.</p>
        </div>

        <div class="order-card-box">
            <div class="order-id">Order #<?php echo htmlspecialchars($order_id); ?></div>
            <div class="order-pickup"><strong>Pickup:</strong> <?php echo htmlspecialchars($pickup_datetime); ?></div>
            <div class="order-status"><strong>Status:</strong> <span>Preparing</span></div>
        </div>

        <div class="confirm-action-container">
            <button type="button" class="view-orders-btn" onclick="window.location.href='my_orders.php'">View My Orders</button>
        </div>
    </div>

</body>
</html>