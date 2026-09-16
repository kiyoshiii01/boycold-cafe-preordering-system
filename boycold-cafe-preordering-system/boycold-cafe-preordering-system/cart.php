<?php
error_reporting(E_ALL);
// Nag-start tayo ng session para sakaling gusto mong i-store ang cart items galing sa database o session sa susunod
session_start();

// Mock cart items (Palitan o ikonekta na lang sa database session sakaling may dynamic cart ka na)
$cart_items = [
    ['name' => 'Caramel Macchiato (Regular)', 'qty' => 1, 'price' => 120.00],
    ['name' => 'Butter Croissant', 'qty' => 2, 'price' => 170.00] // 85 * 2
];

// Compute subtotal
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
        body.cart-page {
            margin: 0;
            padding: 30px 40px;
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

        .cart-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .cart-header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .cart-title {
            color: white;
            font-size: 2.2rem;
            margin: 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-to-menu-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-to-menu-link:hover {
            text-decoration: underline;
        }

        .cart-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 30px;
            margin-bottom: 25px;
        }

        .order-summary-box {
            background-color: #6B4F3F;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 200px;
            color: white;
        }

        .cart-items-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .cart-item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            font-size: 1rem;
            color: white;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            padding-bottom: 10px;
        }

        .item-name {
            flex: 2;
        }

        .item-qty {
            flex: 1;
            text-align: center;
            opacity: 0.9;
        }

        .item-price {
            flex: 1;
            text-align: right;
        }

        .cart-subtotal {
            text-align: right;
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 20px;
            border-top: 2px solid rgba(255,255,255,0.3);
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
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 1.1rem;
            text-shadow: 0 1px 3px rgba(0,0,0,0.4);
        }

        .cart-input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            background-color: #6B4F3F;
            color: white;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
        }

        .cart-input::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        .cart-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .payment-method-display {
            background-color: #6B4F3F;
            padding: 12px 15px;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            font-size: 1rem;
        }

        .place-order-container {
            width: 100%;
        }

        .place-order-btn {
            width: 100%;
            background-color: #6B4F3F;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 6px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            text-align: center;
            transition: background-color 0.2s, opacity 0.2s;
        }

        .place-order-btn:hover {
            opacity: 0.9;
            background-color: #5a4234;
        }

        @media (max-width: 768px) {
            .cart-grid {
                grid-template-columns: 1fr;
            }
            body.cart-page {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="cart-page">

    <div class="cart-container">
        <div class="cart-header-section">
            <h1 class="cart-title">Cart & Checkout</h1>
            <a href="home.php" class="back-to-menu-link">← Back to Menu</a>
        </div>

        <div class="cart-grid">
            <div class="order-summary-box">
                <div class="cart-items-list">
                    <?php if (!empty($cart_items)): ?>
                        <?php foreach ($cart_items as $item): ?>
                            <div class="cart-item-row">
                                <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                                <span class="item-qty">Qty <?php echo (int)$item['qty']; ?></span>
                                <span class="item-price">₱<?php echo number_format($item['price'], 2); ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="cart-item-row" style="justify-content: center;">
                            <span>Your cart is empty.</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="cart-subtotal">
                    Subtotal: ₱<?php echo number_format($subtotal, 2); ?>
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
            </div>
        </div>

        <div class="place-order-container">
            <button type="button" class="place-order-btn" onclick="window.location.href='order_confirm.php'">Place Order</button>
        </div>
    </div>

</body>
</html>