<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$current_category = isset($_GET['category']) ? $_GET['category'] : 'Coffee';

$menu_data = [
    'Coffee' => [
        ['name' => 'Caramel Macchiato', 'price' => '120.00'],
        ['name' => 'Spanish Latte', 'price' => '110.00'],
        ['name' => 'Cafe Mocha', 'price' => '125.00'],
        ['name' => 'Americano', 'price' => '90.00'],
        ['name' => 'Cappuccino', 'price' => '100.00'],
        ['name' => 'Cold Brew', 'price' => '115.00'],
        ['name' => 'Vanilla Latte', 'price' => '120.00'],
        ['name' => 'Dark Mocha', 'price' => '130.00'],
        ['name' => 'Dirty Matcha', 'price' => '140.00']
    ],
    'Non-Coffee' => [
        ['name' => 'Matcha Latte', 'price' => '130.00'],
        ['name' => 'Dark Chocolate', 'price' => '120.00'],
        ['name' => 'Strawberry Milk', 'price' => '110.00'],
        ['name' => 'Wintermelon Milk Tea', 'price' => '100.00'],
        ['name' => 'Hokkaido Milk Tea', 'price' => '100.00'],
        ['name' => 'Taro Milktea', 'price' => '100.00'],
        ['name' => 'Okinawa Milk Tea', 'price' => '100.00'],
        ['name' => 'Cheesecake Frappe', 'price' => '140.00'],
        ['name' => 'Cookies & Cream', 'price' => '135.00']
    ],
    'Pastries' => [
        ['name' => 'Butter Croissant', 'price' => '85.00'],
        ['name' => 'Chocolate Chip Cookie', 'price' => '60.00'],
        ['name' => 'Blueberry Cheesecake', 'price' => '150.00'],
        ['name' => 'Ensaymada', 'price' => '75.00'],
        ['name' => 'Banana Bread', 'price' => '70.00'],
        ['name' => 'Cinnamon Roll', 'price' => '90.00'],
        ['name' => 'Brownie Fudge', 'price' => '65.00'],
        ['name' => 'Carrot Cake', 'price' => '140.00'],
        ['name' => 'Plain Bagel', 'price' => '80.00']
    ],
    'Meals' => [
        ['name' => 'Tapsilog', 'price' => '160.00'],
        ['name' => 'Tocilog', 'price' => '150.00'],
        ['name' => 'Longsilog', 'price' => '150.00'],
        ['name' => 'Spaghetti', 'price' => '130.00'],
        ['name' => 'Carbonara', 'price' => '140.00'],
        ['name' => 'Chicken Wings Rice', 'price' => '170.00'],
        ['name' => 'Sandwich', 'price' => '99.00'],
        ['name' => 'Burger Steak', 'price' => '160.00'],
        ['name' => 'Hungarian Sandwich', 'price' => '150.00']
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
        body.dashboard-page {
            margin: 0;
            padding: 30px 40px;
            min-height: 100vh;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background:
                linear-gradient(rgba(30, 20, 15, 0.48), rgba(30, 20, 15, 0.48)),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
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
            font-weight: bold;
            text-shadow: 0 2px 5px rgba(0,0,0,0.4);
        }

        .nav-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        .nav-buttons a {
            background-color: #6B4F3F;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            transition: background-color 0.2s;
        }

        .nav-buttons a:hover {
            background-color: #4A3525;
        }

        /* Istilo para sa Logout Button */
        .nav-buttons a.logout-nav-btn {
            background-color: #a93226;
        }

        .nav-buttons a.logout-nav-btn:hover {
            background-color: #922b21;
        }

        .menu-title {
            color: white;
            font-size: 1.6rem;
            margin-bottom: 12px;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .search-container {
            width: 45%;
            margin-bottom: 20px;
        }

        .search-container input {
            width: 100%;
            padding: 14px;
            border: 2px solid transparent;
            border-radius: 8px;
            background: white;
            color: #333;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }

        .search-container input:focus {
            border-color: #6B4F3F;
        }

        .category-buttons {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .category-btn {
            background-color: #6B4F3F;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            font-size: 1rem;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s;
        }

        .category-btn:hover, .category-btn.active {
            background-color: #4A3525;
            border: 2px solid white;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .product-card {
            background-color: #6B4F3F;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 90px;
            text-decoration: none;
            color: white;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }

        .product-card:hover {
            background-color: #5A3F30;
            transform: translateY(-2px);
        }

        .product-name {
            font-weight: bold;
            color: white;
            font-size: 1.1rem;
            text-align: left;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            font-weight: bold;
        }

        .product-footer span {
            color: white;
        }

        .add-btn {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .add-btn:hover {
            background-color: white;
            color: #6B4F3F;
        }

        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .search-container {
                width: 100%;
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

        <div class="search-container">
            <input type="text" placeholder="Search menu items...">
        </div>

        <!-- Mga Pindutang Category na may kasamang active state at URL parameter -->
        <div class="category-buttons">
            <a href="home.php?category=Coffee" class="category-btn <?php echo ($current_category == 'Coffee') ? 'active' : ''; ?>">Coffee</a>
            <a href="home.php?category=Non-Coffee" class="category-btn <?php echo ($current_category == 'Non-Coffee') ? 'active' : ''; ?>">Non-Coffee</a>
            <a href="home.php?category=Pastries" class="category-btn <?php echo ($current_category == 'Pastries') ? 'active' : ''; ?>">Pastries</a>
            <a href="home.php?category=Meals" class="category-btn <?php echo ($current_category == 'Meals') ? 'active' : ''; ?>">Meals</a>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $index => $item): ?>
            <div class="product-card" onclick="window.location.href='product_details.php?category=<?php echo urlencode($current_category); ?>&id=<?php echo $index + 1; ?>'">
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