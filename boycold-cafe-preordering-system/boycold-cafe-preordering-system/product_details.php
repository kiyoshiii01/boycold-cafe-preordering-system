<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kunin ang category at id mula sa URL
$current_category = isset($_GET['category']) ? $_GET['category'] : 'Coffee';
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Ulitin ang menu data para makuha ang tamang detalye ng pinindot na produkto
$menu_data = [
    'Coffee' => [
        ['name' => 'Caramel Macchiato', 'price' => '120.00', 'desc' => 'Rich espresso with vanilla syrup, steamed milk, and caramel drizzle.'],
        ['name' => 'Spanish Latte', 'price' => '110.00', 'desc' => 'Smooth espresso combined with textured milk and sweetened condensed milk.'],
        ['name' => 'Cafe Mocha', 'price' => '125.00', 'desc' => 'A sweet blend of espresso, chocolate syrup, and steamed milk.'],
        ['name' => 'Americano', 'price' => '90.00', 'desc' => 'Espresso shots topped with hot water for a deep, robust flavor.'],
        ['name' => 'Cappuccino', 'price' => '100.00', 'desc' => 'A classic Italian coffee with equal parts espresso, steamed milk, and foam.'],
        ['name' => 'Cold Brew', 'price' => '115.00', 'desc' => 'Slow-steeped, ultra-smooth cold coffee served over ice.'],
        ['name' => 'Vanilla Latte', 'price' => '120.00', 'desc' => 'Espresso and steamed milk infused with sweet vanilla flavor.'],
        ['name' => 'Dark Mocha', 'price' => '130.00', 'desc' => 'Bold espresso mixed with rich dark chocolate and milk.'],
        ['name' => 'Dirty Matcha', 'price' => '140.00', 'desc' => 'Earthly Japanese matcha layered with a rich shot of espresso.']
    ],
    'Non-Coffee' => [
        ['name' => 'Matcha Latte', 'price' => '130.00', 'desc' => 'Premium ceremonial grade matcha green tea with creamy milk.'],
        ['name' => 'Dark Chocolate', 'price' => '120.00', 'desc' => 'Rich, decadent dark chocolate drink served hot or iced.'],
        ['name' => 'Strawberry Milk', 'price' => '110.00', 'desc' => 'Sweet strawberry puree mixed with fresh creamy milk.'],
        ['name' => 'Wintermelon Milk Tea', 'price' => '100.00', 'desc' => 'Classic milk tea infused with rich wintermelon caramel flavor.'],
        ['name' => 'Hokkaido Milk Tea', 'price' => '100.00', 'desc' => 'Creamy milk tea with a distinct hint of caramel and rich sweetness.'],
        ['name' => 'Taro Milktea', 'price' => '100.00', 'desc' => 'Sweet and creamy milk tea flavored with authentic taro root.'],
        ['name' => 'Okinawa Milk Tea', 'price' => '100.00', 'desc' => 'Roasted brown sugar milk tea with a deep, caramel-like taste.'],
        ['name' => 'Cheesecake Frappe', 'price' => '140.00', 'desc' => 'Blended creamy beverage topped with rich cheesecake flavor.'],
        ['name' => 'Cookies & Cream', 'price' => '135.00', 'desc' => 'Crushed chocolate cookies blended with milk and vanilla ice cream.']
    ],
    'Pastries' => [
        ['name' => 'Butter Croissant', 'price' => '85.00', 'desc' => 'Flaky, buttery, golden-brown French pastry baked to perfection.'],
        ['name' => 'Chocolate Chip Cookie', 'price' => '60.00', 'desc' => 'Chewy, freshly baked cookie loaded with rich chocolate chunks.'],
        ['name' => 'Blueberry Cheesecake', 'price' => '150.00', 'desc' => 'Creamy cheesecake topped with sweet and tangy blueberry compote.'],
        ['name' => 'Ensaymada', 'price' => '75.00', 'desc' => 'Soft, sweet brioche bread topped with butter, sugar, and grated cheese.'],
        ['name' => 'Banana Bread', 'price' => '70.00', 'desc' => 'Moist and flavorful loaf made with ripe sweet bananas.'],
        ['name' => 'Cinnamon Roll', 'price' => '100.00', 'desc' => 'Soft pastry swirled with cinnamon sugar and drizzled with sweet icing.'],
        ['name' => 'Brownie Fudge', 'price' => '65.00', 'desc' => 'Fudgy, rich chocolate square with a crackly top crust.'],
        ['name' => 'Carrot Cake', 'price' => '140.00', 'desc' => 'Spiced moist cake loaded with carrots and covered in cream cheese frosting.'],
        ['name' => 'Plain Bagel', 'price' => '80.00', 'desc' => 'Chewy, traditional baked ring bread served best toasted.']
    ],
    'Meals' => [
        ['name' => 'Tapsilog', 'price' => '160.00', 'desc' => 'Cured beef tapa served with garlic fried rice and sunny-side-up egg.'],
        ['name' => 'Tocilog', 'price' => '150.00', 'desc' => 'Sweet cured pork tocino with garlic rice and fried egg.'],
        ['name' => 'Longsilog', 'price' => '150.00', 'desc' => 'Filipino style sweet sausage paired with garlic rice and egg.'],
        ['name' => 'Spaghetti', 'price' => '130.00', 'desc' => 'Sweet-style Filipino spaghetti with ground meat and hotdog slices.'],
        ['name' => 'Carbonara', 'price' => '140.00', 'desc' => 'Creamy pasta tossed with bacon bits, mushrooms, and parmesan cheese.'],
        ['name' => 'Chicken Wings Rice', 'price' => '170.00', 'desc' => 'Crispy fried chicken wings served with seasoned rice.'],
        ['name' => 'Club Sandwich', 'price' => '140.00', 'desc' => 'Triple-decker sandwich with chicken, lettuce, tomato, and egg.'],
        ['name' => 'Burger Steak', 'price' => '160.00', 'desc' => 'Juicy beef patty drenched in savory mushroom gravy over rice.'],
        ['name' => 'Hungarian Sandwich', 'price' => '150.00', 'desc' => 'Spicy Hungarian sausage tucked in a toasted bun with special sauce.']
    ]
];

// Kunin ang tamang produkto base sa ID (array index ay id - 1)
$products_list = isset($menu_data[$current_category]) ? $menu_data[$current_category] : $menu_data['Coffee'];
$index = $product_id - 1;
if (!isset($products_list[$index])) {
    $index = 0; // Fallback kapag out of bounds
}
$current_product = $products_list[$index];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Product Details</title>
    <style>
        body.product-page {
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

        .product-details-frame {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .back-link-container {
            margin-bottom: 20px;
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

        .product-content-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 30px;
            background-color: #6B4F3F;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            color: white;
        }

        .product-image-box {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px dashed rgba(255, 255, 255, 0.4);
            border-radius: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 280px;
            font-weight: bold;
            color: white;
        }

        .product-info-box {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .product-name-title {
            color: white;
            font-size: 2rem;
            margin: 0;
            font-weight: bold;
        }

        .product-price {
            color: white;
            font-size: 1.3rem;
            font-weight: bold;
        }

        .product-desc {
            color: white;
            font-size: 1rem;
            margin: 0;
            opacity: 0.9;
            line-height: 1.4;
        }

        .option-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .option-label {
            color: white;
            font-weight: bold;
            font-size: 1rem;
        }

        .size-buttons {
            display: flex;
            gap: 10px;
        }

        .size-btn {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            color: white;
            transition: background-color 0.2s;
        }

        .size-btn.active, .size-btn:hover {
            background-color: white;
            color: #6B4F3F;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            width: fit-content;
            padding: 5px 12px;
            border-radius: 6px;
        }

        .qty-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
        }

        .qty-number {
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .action-container {
            margin-top: 10px;
        }

        .add-to-cart-btn {
            width: 100%;
            background-color: white;
            color: #6B4F3F;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: background-color 0.2s;
        }

        .add-to-cart-btn:hover {
            background-color: #f0f0f0;
        }

        @media (max-width: 768px) {
            .product-content-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="product-page">

    <div class="product-details-frame">
        
        <div class="back-link-container">
            <a href="home.php?category=<?php echo urlencode($current_category); ?>" class="back-link">← Back to Menu</a>
        </div>

        <div class="product-content-grid">
            
            <div class="product-image-box">
                <span>[ <?php echo strtoupper(htmlspecialchars($current_product['name'])); ?> ]</span>
            </div>

            <div class="product-info-box">
                <h1 class="product-name-title"><?php echo htmlspecialchars($current_product['name']); ?></h1>
                <div class="product-price">₱ <?php echo htmlspecialchars($current_product['price']); ?></div>
                <p class="product-desc"><?php echo htmlspecialchars($current_product['desc']); ?></p>

                <div class="option-group">
                    <label class="option-label">Size</label>
                    <div class="size-buttons">
                        <button type="button" class="size-btn active" onclick="selectSize(this)">Regular</button>
                        <button type="button" class="size-btn" onclick="selectSize(this)">Large</button>
                    </div>
                </div>

                <div class="option-group">
                    <label class="option-label">Quantity</label>
                    <div class="quantity-selector">
                        <button type="button" class="qty-btn" onclick="decreaseQty()">-</button>
                        <span class="qty-number" id="qtyValue">1</span>
                        <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                    </div>
                </div>

                <div class="action-container">
                    <button type="button" class="add-to-cart-btn" onclick="window.location.href='cart.php'">Add to Cart</button>
                </div>
            </div>

        </div>

    </div>

    <script>
        // Simple JavaScript para sa Quantity at Size buttons
        function increaseQty() {
            let qtyEl = document.getElementById('qtyValue');
            let currentQty = parseInt(qtyEl.innerText);
            qtyEl.innerText = currentQty + 1;
        }

        function decreaseQty() {
            let qtyEl = document.getElementById('qtyValue');
            let currentQty = parseInt(qtyEl.innerText);
            if (currentQty > 1) {
                qtyEl.innerText = currentQty - 1;
            }
        }

        function selectSize(btn) {
            let buttons = document.querySelectorAll('.size-btn');
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        }
    </script>

</body>
</html>