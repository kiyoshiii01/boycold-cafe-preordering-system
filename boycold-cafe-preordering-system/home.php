<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Dashboard & Menu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="dashboard-page">

    <div class="dashboard-container">
        <!-- Top Header: Title & Nav Buttons -->
        <div class="top-header">
            <h1 class="cafe-title">BOYCOLD CAFE</h1>
            <div class="nav-buttons">
                <a href="home.php">Home</a>
                <a href="cart.php">Cart</a>
                <a href="my_orders.php">My Orders</a>
                <a href="profile.php">Profile</a>
            </div>
        </div>

        <!-- Menu Title -->
        <div class="menu-title">Menu</div>

        <!-- Search Bar -->
        <div class="search-container">
            <input type="text" placeholder="Search menu items...">
        </div>

        <!-- Category Buttons -->
        <div class="category-buttons">
            <button>Coffee</button>
            <button>Non-Coffee</button>
            <button>Pastries</button>
            <button>Meals</button>
        </div>

        <!-- Product Grid (Cards) -->
        <div class="product-grid">
            <?php for ($i = 1; $i <= 9; $i++): ?>
            <div class="product-card" onclick="window.location.href='product_details.php?id=<?php echo $i; ?>'" style="cursor: pointer;">
                <div class="product-name">Product Name</div>
                <div class="product-footer">
                    <span>₱ 00.00</span>
                    <span class="add-btn">+ Add</span>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>

</body>
</html>