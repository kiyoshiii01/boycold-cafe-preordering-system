<?php
error_reporting(E_ALL);
session_start();

$cart_items = [
    ['name' => 'Caramel Macchiato (Regular)', 'qty' => 1, 'price' => 120.00],
    ['name' => 'Butter Croissant', 'qty' => 2, 'price' => 170.00] // 85 * 2
];

$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Cart & Checkout</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body.cart-page {
            margin: 0;
            padding: 40px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                linear-gradient(rgba(30, 20, 15, 0.65), rgba(30, 20, 15, 0.65)),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .cart-container {
            width: 100%;
            max-width: 950px;
            margin: 0 auto;
        }

        .cart-header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .cart-title {
            color: white;
            font-size: 2rem;
            margin: 0;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .back-to-menu-link {
            color: #f3e5d8;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
            transition: color 0.2s ease;
        }

        .back-to-menu-link:hover {
            color: white;
            text-decoration: underline;
        }

        .cart-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 30px;
            margin-bottom: 25px;
            background: rgba(45, 30, 22, 0.85);
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            color: white;
        }

        .order-summary-box {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .cart-items-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 280px;
            overflow-y: auto;
            padding-right: 5px;
        }

        .cart-item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 0.95rem;
            color: #f3e5d8;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 12px;
        }

        .item-name {
            flex: 2;
            color: white;
        }

        .item-qty {
            flex: 1;
            text-align: center;
            color: #e0d0c0;
        }

        .item-price {
            flex: 1;
            text-align: right;
            color: #f3e5d8;
            font-weight: 700;
        }

        .cart-subtotal {
            text-align: right;
            font-weight: 700;
            font-size: 1.25rem;
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 15px;
            color: white;
        }

        .checkout-options-box {
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
        }

        .form-group-cart label {
            display: block;
            color: white;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .cart-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.12);
            color: white;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
            transition: background-color 0.2s;
        }

        .cart-input:focus {
            background-color: rgba(255, 255, 255, 0.18);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .cart-input::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        .cart-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .payment-method-display {
            background-color: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 12px 15px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            text-align: center;
            font-size: 1rem;
        }

        .place-order-container {
            width: 100%;
        }

        .place-order-btn {
            width: 100%;
            background: linear-gradient(135deg, #f3e5d8 0%, #e2d2c3 100%);
            color: #5c3a21;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .place-order-btn:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            body.cart-page {
                padding: 20px;
            }
            .cart-grid {
                grid-template-columns: 1fr;
                padding: 20px;
            }
        }
    </style>
</head>
<body class="cart-page">

    <div class="cart-container">
        <div class="cart-header-section">
            <h1 class="cart-title">Cart & Checkout</h1>
            <a href="home.php" class="back-to-menu-link">&larr; Back to Menu</a>
        </div>

        <div class="cart-grid">
            <div class="order-summary-box">
                <div class="cart-items-list">
                    <?php if (!empty($cart_items)): ?>
                        <?php foreach ($cart_items as $item): ?>
                            <div class="cart-item-row">
                                <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                                <span class="item-qty">Qty <?php echo (int)$item['qty']; ?></span>
                                <span class="item-price">&#8369;<?php echo number_format($item['price'], 2); ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="cart-item-row" style="justify-content: center;">
                            <span>Your cart is empty.</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="cart-subtotal">
                    Subtotal: &#8369;<?php echo number_format($subtotal, 2); ?>
                </div>
            </div>

            <div class="checkout-options-box">
                <div class="form-group-cart">
                    <label for="pickupDate">Pickup Date & Time</label>
                    <input type="datetime-local" id="pickupDate" class="cart-input" required>
                </div>

                <div class="form-group-cart">
                    <label>Payment Method</label>
                    <div class="payment-method-display">Cash on Pickup</div>
                </div>

                <div class="place-order-container" style="margin-top: 10px;">
                    <button type="button" class="place-order-btn" onclick="window.location.href='order_confirm.php'">Place Order</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>