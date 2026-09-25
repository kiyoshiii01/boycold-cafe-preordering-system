<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$current_category = isset($_GET['category']) ? $_GET['category'] : 'Coffee';

$menu_data = [
    'Coffee' => [
        ['name' => 'Caramel Macchiato', 'price' => '120.00', 'img' => 'images/coffee/CaramelM.png'],
        ['name' => 'Spanish Latte', 'price' => '110.00', 'img' => 'images/coffee/SpanishL.png'],
        ['name' => 'Cafe Mocha', 'price' => '125.00', 'img' => 'images/coffee/CafeM.png'],
        ['name' => 'Americano', 'price' => '90.00', 'img' => 'images/coffee/Americano.png'],
        ['name' => 'Cappuccino', 'price' => '100.00', 'img' => 'images/coffee/Capp.png'],
        ['name' => 'Cold Brew', 'price' => '115.00', 'img' => 'images/coffee/ColdB.png'],
        ['name' => 'Vanilla Latte', 'price' => '120.00', 'img' => 'images/coffee/VanillaL.png'],
        ['name' => 'Dark Mocha', 'price' => '130.00', 'img' => 'images/coffee/DarkM.png'],
        ['name' => 'Dirty Matcha', 'price' => '140.00', 'img' => 'images/coffee/DirtyM.png']
    ],
    'Non-Coffee' => [
        ['name' => 'Matcha Latte', 'price' => '130.00', 'img' => 'images/non_coffee/MatchaL.png'],
        ['name' => 'Dark Chocolate', 'price' => '120.00', 'img' => 'images/non_coffee/DarkC.png'],
        ['name' => 'Strawberry Milk', 'price' => '110.00', 'img' => 'images/non_coffee/StrawberryM.png'],
        ['name' => 'Wintermelon Milk Tea', 'price' => '100.00', 'img' => 'images/non_coffee/WinterMMT.png'],
        ['name' => 'Hokkaido Milk Tea', 'price' => '100.00', 'img' => 'images/non_coffee/HokkaidoMT.png'],
        ['name' => 'Taro Milktea', 'price' => '100.00', 'img' => 'images/non_coffee/TaroMT.png'],
        ['name' => 'Okinawa Milk Tea', 'price' => '100.00', 'img' => 'images/non_coffee/OkinawaMT.png'],
        ['name' => 'Chocolate Frappe', 'price' => '140.00', 'img' => 'images/non_coffee/ChocolateF.png'],
        ['name' => 'Cookies & Cream', 'price' => '135.00', 'img' => 'images/non_coffee/C&C.png']
    ],
    'Pastries' => [
        ['name' => 'Butter Croissant', 'price' => '85.00', 'img' => 'images/pastries/ButterC.png'],
        ['name' => 'Chocolate Chip Cookie', 'price' => '60.00', 'img' => 'images/pastries/ChocolateCC.png'],
        ['name' => 'Blueberry Cheesecake', 'price' => '150.00', 'img' => 'images/pastries/BlueberryCC.png'],
        ['name' => 'Ensaymada', 'price' => '75.00', 'img' => 'images/pastries/Ensaymada.png'],
        ['name' => 'Banana Bread', 'price' => '70.00', 'img' => 'images/pastries/BananaB.png'],
        ['name' => 'Cinnamon Roll', 'price' => '90.00', 'img' => 'images/pastries/CinnamonR.png'],
        ['name' => 'Brownie Fudge', 'price' => '65.00', 'img' => 'images/pastries/Brownief.png'],
        ['name' => 'Carrot Cake', 'price' => '140.00', 'img' => 'images/pastries/CarrotC.png'],
        ['name' => 'Plain Bagel', 'price' => '80.00', 'img' => 'images/pastries/Plain Bagel.png']
    ],
    'Meals' => [
        ['name' => 'Tapsilog', 'price' => '160.00', 'img' => 'images/meals/Tapsilog.png'],
        ['name' => 'Tocilog', 'price' => '150.00', 'img' => 'images/meals/Tocilog.png'],
        ['name' => 'Longsilog', 'price' => '150.00', 'img' => 'images/meals/Longsilog.png'],
        ['name' => 'Spaghetti', 'price' => '130.00', 'img' => 'images/meals/Spaghetti.png'],
        ['name' => 'Carbonara', 'price' => '140.00', 'img' => 'images/meals/Carbonara.png'],
        ['name' => 'Chicken Wings Rice', 'price' => '170.00', 'img' => 'images/meals/ChickenWR.png'],
        ['name' => 'Sandwich', 'price' => '99.00', 'img' => 'images/meals/Sandwich.png'],
        ['name' => 'Burger Steak', 'price' => '160.00', 'img' => 'images/meals/BurgerS.png'],
        ['name' => 'Hungarian Sandwich', 'price' => '150.00', 'img' => 'images/meals/HungarianS.png']
    ]
];

// Kunin ang mga items batay sa piniling category, kung wala man fallback sa Coffee
$products = isset($menu_data[$current_category]) ? $menu_data[$current_category] : $menu_data['Coffee'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Dashboard & Menu</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body.dashboard-page {
            margin: 0;
            padding: 30px 40px;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                linear-gradient(rgba(30, 20, 15, 0.65), rgba(30, 20, 15, 0.65)),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .dashboard-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .cafe-title {
            color: white;
            font-size: 2.2rem;
            margin: 0;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        }

        .nav-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .nav-buttons a {
            background: rgba(45, 30, 22, 0.8);
            color: #f3e5d8;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: all 0.3s ease;
        }

        .nav-buttons a:hover {
            background: #6B4F3F;
            color: white;
            transform: translateY(-2px);
        }

        .nav-buttons a.logout-nav-btn {
            background: rgba(198, 40, 40, 0.85);
            color: white;
            border-color: rgba(255, 255, 255, 0.2);
        }

        .nav-buttons a.logout-nav-btn:hover {
            background: rgb(198, 40, 40);
        }

        .menu-title {
            color: white;
            font-size: 1.6rem;
            margin-bottom: 15px;
            font-weight: 700;
            text-shadow: 0 2px 5px rgba(0,0,0,0.4);
        }

        .search-container {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }

        .search-container input {
            width: 100%;
            padding: 13px 16px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            font-size: 1rem;
            outline: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .search-container input:focus {
            border-color: #8D6E63;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(141, 110, 99, 0.3);
        }

        .category-buttons {
            display: flex;
            gap: 12px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .category-btn {
            background: rgba(45, 30, 22, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 10px 22px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            color: #f3e5d8;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            font-size: 0.95rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .category-btn:hover {
            background: #6B4F3F;
            color: white;
            transform: translateY(-2px);
        }

        .category-btn.active {
            background: linear-gradient(135deg, #8D6E63 0%, #5c3a21 100%);
            color: white;
            border-color: rgba(255, 255, 255, 0.3);
            font-weight: 700;
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .product-card {
            background: rgba(45, 30, 22, 0.82);
            padding: 16px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.35);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 250px;
            text-decoration: none;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            background: rgba(55, 38, 28, 0.9);
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.45);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .product-img-container {
            width: 100%;
            height: 125px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-img-container img {
            transform: scale(1.05);
        }

        .product-name {
            font-weight: 700;
            color: white;
            font-size: 1.05rem;
            text-align: left;
            margin-top: 10px;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f3e5d8;
            font-weight: 700;
            margin-top: 5px;
        }

        .product-footer span {
            color: #ffffff;
        }

        .add-btn {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 6px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .add-btn:hover {
            background: #ffffff;
            color: #5c3a21;
        }

        @media (max-width: 768px) {
            body.dashboard-page {
                padding: 20px 15px;
            }
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            .search-container {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="dashboard-page">

    <div class="dashboard-container">

        <div class="top-header">
            <h1 class="cafe-title">BOYCOLD CAFE</h1>
            <div class="nav-buttons">
                <a href="home.php">Home</a>
                <a href="cart.php">Cart</a>
                <a href="my_orders.php">My Orders</a>
                <a href="profile.php">Profile</a>
                <a href="logout.php" class="logout-nav-btn">Logout</a>
            </div>
        </div>

        <div class="menu-title">Menu - <?php echo htmlspecialchars($current_category); ?></div>

        <div class="container search-container" style="padding:0; margin-bottom: 20px; width: 100%; max-width: 400px;">
            <input type="text" placeholder="Search menu items...">
        </div>

        <div class="category-buttons">
            <a href="home.php?category=Coffee" class="category-btn <?php echo ($current_category == 'Coffee') ? 'active' : ''; ?>">Coffee</a>
            <a href="home.php?category=Non-Coffee" class="category-btn <?php echo ($current_category == 'Non-Coffee') ? 'active' : ''; ?>">Non-Coffee</a>
            <a href="home.php?category=Pastries" class="category-btn <?php echo ($current_category == 'Pastries') ? 'active' : ''; ?>">Pastries</a>
            <a href="home.php?category=Meals" class="category-btn <?php echo ($current_category == 'Meals') ? 'active' : ''; ?>">Meals</a>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $index => $item): ?>
            <div class="product-card" onclick="window.location.href='product_details.php?category=<?php echo urlencode($current_category); ?>&id=<?php echo $index + 1; ?>'">
                <div class="product-img-container">
                    <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                </div>
                <div class="product-name"><?php echo htmlspecialchars($item['name']); ?></div>
                <div class="product-footer">
                    <span>₱ <?php echo htmlspecialchars($item['price']); ?></span>
                    <span class="add-btn">+ Add</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>