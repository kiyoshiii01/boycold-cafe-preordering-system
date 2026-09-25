<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$current_category = isset($_GET['category']) ? $_GET['category'] : 'Coffee';
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$menu_data = [
    'Coffee' => [
        ['name' => 'Caramel Macchiato', 'price' => '120.00', 'desc' => 'Rich espresso with vanilla syrup, steamed milk, and caramel drizzle.', 'img' => 'images/coffee/CaramelM.png'],
        ['name' => 'Spanish Latte', 'price' => '110.00', 'desc' => 'Smooth espresso combined with textured milk and sweetened condensed milk.', 'img' => 'images/coffee/SpanishL.png'],
        ['name' => 'Cafe Mocha', 'price' => '125.00', 'desc' => 'A sweet blend of espresso, chocolate syrup, and steamed milk.', 'img' => 'images/coffee/CafeM.png'],
        ['name' => 'Americano', 'price' => '90.00', 'desc' => 'Espresso shots topped with hot water for a deep, robust flavor.', 'img' => 'images/coffee/Americano.png'],
        ['name' => 'Cappuccino', 'price' => '100.00', 'desc' => 'A classic Italian coffee with equal parts espresso, steamed milk, and foam.', 'img' => 'images/coffee/Capp.png'],
        ['name' => 'Cold Brew', 'price' => '115.00', 'desc' => 'Slow-steeped, ultra-smooth cold coffee served over ice.', 'img' => 'images/coffee/ColdB.png'],
        ['name' => 'Vanilla Latte', 'price' => '120.00', 'desc' => 'Espresso and steamed milk infused with sweet vanilla flavor.', 'img' => 'images/coffee/VanillaL.png'],
        ['name' => 'Dark Mocha', 'price' => '130.00', 'desc' => 'Bold espresso mixed with rich dark chocolate and milk.', 'img' => 'images/coffee/DarkM.png'],
        ['name' => 'Dirty Matcha', 'price' => '140.00', 'desc' => 'Earthly Japanese matcha layered with a rich shot of espresso.', 'img' => 'images/coffee/DirtyM.png']
    ],
    'Non-Coffee' => [
        ['name' => 'Matcha Latte', 'price' => '130.00', 'desc' => 'Premium ceremonial grade matcha green tea with creamy milk.', 'img' => 'images/non_coffee/MatchaL.png'],
        ['name' => 'Dark Chocolate', 'price' => '120.00', 'desc' => 'Rich, decadent dark chocolate drink served hot or iced.', 'img' => 'images/non_coffee/DarkC.png'],
        ['name' => 'Strawberry Milk', 'price' => '110.00', 'desc' => 'Sweet strawberry puree mixed with fresh creamy milk.', 'img' => 'images/non_coffee/StrawberryM.png'],
        ['name' => 'Wintermelon Milk Tea', 'price' => '100.00', 'desc' => 'Classic milk tea infused with rich wintermelon caramel flavor.', 'img' => 'images/non_coffee/WinterMMT.png'],
        ['name' => 'Hokkaido Milk Tea', 'price' => '100.00', 'desc' => 'Creamy milk tea with a distinct hint of caramel and rich sweetness.', 'img' => 'images/non_coffee/HokkaidoMT.png'],
        ['name' => 'Taro Milktea', 'price' => '100.00', 'desc' => 'Sweet and creamy milk tea flavored with authentic taro root.', 'img' => 'images/non_coffee/TaroMT.png'],
        ['name' => 'Okinawa Milk Tea', 'price' => '100.00', 'desc' => 'Roasted brown sugar milk tea with a deep, caramel-like taste.', 'img' => 'images/non_coffee/OkinawaMT.png'],
        ['name' => 'Chocolate Frappe', 'price' => '140.00', 'desc' => 'Blended creamy beverage topped with rich cheesecake flavor.', 'img' => 'images/non_coffee/ChocolateF.png'],
        ['name' => 'Cookies & Cream', 'price' => '135.00', 'desc' => 'Crushed chocolate cookies blended with milk and vanilla ice cream.', 'img' => 'images/non_coffee/C&C.png']
    ],
    'Pastries' => [
        ['name' => 'Butter Croissant', 'price' => '85.00', 'desc' => 'Flaky, buttery, golden-brown French pastry baked to perfection.', 'img' => 'images/pastries/ButterC.png'],
        ['name' => 'Chocolate Chip Cookie', 'price' => '60.00', 'desc' => 'Chewy, freshly baked cookie loaded with rich chocolate chunks.', 'img' => 'images/pastries/ChocolateCC.png'],
        ['name' => 'Blueberry Cheesecake', 'price' => '150.00', 'desc' => 'Creamy cheesecake topped with sweet and tangy blueberry compote.', 'img' => 'images/pastries/BlueberryCC.png'],
        ['name' => 'Ensaymada', 'price' => '75.00', 'desc' => 'Soft, sweet brioche bread topped with butter, sugar, and grated cheese.', 'img' => 'images/pastries/Ensaymada.png'],
        ['name' => 'Banana Bread', 'price' => '70.00', 'desc' => 'Moist and flavorful loaf made with ripe sweet bananas.', 'img' => 'images/pastries/BananaB.png'],
        ['name' => 'Cinnamon Roll', 'price' => '100.00', 'desc' => 'Soft pastry swirled with cinnamon sugar and drizzled with sweet icing.', 'img' => 'images/pastries/CinnamonR.png'],
        ['name' => 'Brownie Fudge', 'price' => '65.00', 'desc' => 'Fudgy, rich chocolate square with a crackly top crust.', 'img' => 'images/pastries/Brownief.png'],
        ['name' => 'Carrot Cake', 'price' => '140.00', 'desc' => 'Spiced moist cake loaded with carrots and covered in cream cheese frosting.', 'img' => 'images/pastries/CarrotC.png'],
        ['name' => 'Plain Bagel', 'price' => '80.00', 'desc' => 'Chewy, traditional baked ring bread served best toasted.', 'img' => 'images/pastries/Plain Bagel.png']
    ],
    'Meals' => [
        ['name' => 'Tapsilog', 'price' => '160.00', 'desc' => 'Cured beef tapa served with garlic fried rice and sunny-side-up egg.', 'img' => 'images/meals/Tapsilog.png'],
        ['name' => 'Tocilog', 'price' => '150.00', 'desc' => 'Sweet cured pork tocino with garlic rice and fried egg.', 'img' => 'images/meals/Tocilog.png'],
        ['name' => 'Longsilog', 'price' => '150.00', 'desc' => 'Filipino style sweet sausage paired with garlic rice and egg.', 'img' => 'images/meals/Longsilog.png'],
        ['name' => 'Spaghetti', 'price' => '130.00', 'desc' => 'Sweet-style Filipino spaghetti with ground meat and hotdog slices.', 'img' => 'images/meals/Spaghetti.png'],
        ['name' => 'Carbonara', 'price' => '140.00', 'desc' => 'Creamy pasta tossed with bacon bits, mushrooms, and parmesan cheese.', 'img' => 'images/meals/Carbonara.png'],
        ['name' => 'Chicken Wings Rice', 'price' => '170.00', 'desc' => 'Crispy fried chicken wings served with seasoned rice.', 'img' => 'images/meals/ChickenWR.png'],
        ['name' => 'Club Sandwich', 'price' => '140.00', 'desc' => 'Triple-decker sandwich with chicken, lettuce, tomato, and egg.', 'img' => 'images/meals/Sandwich.png'],
        ['name' => 'Burger Steak', 'price' => '160.00', 'desc' => 'Juicy beef patty drenched in savory mushroom gravy over rice.', 'img' => 'images/meals/BurgerS.png'],
        ['name' => 'Hungarian Sandwich', 'price' => '150.00', 'desc' => 'Spicy Hungarian sausage tucked in a toasted bun with special sauce.', 'img' => 'images/meals/HungarianS.png']
    ]
];

$products_list = isset($menu_data[$current_category]) ? $menu_data[$current_category] : $menu_data['Coffee'];
$index = $product_id - 1;
if (!isset($products_list[$index])) {
    $index = 0; 
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
        * {
            box-sizing: border-box;
        }

        body.product-page {
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

        .product-details-frame {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .back-link-container {
            margin-bottom: 20px;
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

        .product-content-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 30px;
            background: rgba(45, 30, 22, 0.85);
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            color: white;
        }

        .product-image-box {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 280px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .product-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .product-image-box:hover img {
            transform: scale(1.04);
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
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .product-price {
            color: #f3e5d8;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .product-desc {
            color: #e0d0c0;
            font-size: 0.98rem;
            margin: 0;
            line-height: 1.5;
        }

        .option-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .option-label {
            color: white;
            font-weight: 700;
            font-size: 0.95rem;
        }

        .size-buttons {
            display: flex;
            gap: 10px;
        }

        .size-btn {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 9px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            color: white;
            transition: all 0.2s ease;
        }

        .size-btn:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .size-btn.active {
            background: #8D6E63;
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 18px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.15);
            width: fit-content;
            padding: 6px 16px;
            border-radius: 8px;
        }

        .qty-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .qty-btn:hover {
            opacity: 0.7;
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
            background: linear-gradient(135deg, #f3e5d8 0%, #e2d2c3 100%);
            color: #5c3a21;
            border: none;
            padding: 13px;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            body.product-page {
                padding: 20px;
            }
            .product-content-grid {
                grid-template-columns: 1fr;
                padding: 20px;
            }
        }
    </style>
</head>
<body class="product-page">

    <div class="product-details-frame">
        
        <div class="back-link-container">
            <a href="home.php?category=<?php echo urlencode($current_category); ?>" class="back-link">&larr; Back to Menu</a>
        </div>

        <div class="product-content-grid">
            
            <div class="product-image-box">
                <img src="<?php echo htmlspecialchars($current_product['img']); ?>" alt="<?php echo htmlspecialchars($current_product['name']); ?>">
            </div>

            <div class="product-info-box">
                <h1 class="product-name-title"><?php echo htmlspecialchars($current_product['name']); ?></h1>
                <div class="product-price">&#8369; <?php echo htmlspecialchars($current_product['price']); ?></div>
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