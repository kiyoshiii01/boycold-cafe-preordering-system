<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mock inventory data (Pwede mong ikonekta sa database sa hinaharap)
$inventory_items = [
    ['name' => 'Iced Coffee', 'category' => 'Beverage', 'stock' => 20, 'sold' => 5, 'remaining' => 15],
    ['name' => 'Hot Americano', 'category' => 'Beverage', 'stock' => 30, 'sold' => 12, 'remaining' => 18],
    ['name' => 'Matcha Latte', 'category' => 'Beverage', 'stock' => 15, 'sold' => 8, 'remaining' => 7],
    ['name' => 'Chocolate Croissant', 'category' => 'Pastry', 'stock' => 25, 'sold' => 10, 'remaining' => 15],
    ['name' => 'Cheesecake Slice', 'category' => 'Pastry', 'stock' => 10, 'sold' => 6, 'remaining' => 4],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Inventory Management</title>
    <style>
        body.inventory-page {
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

        .inventory-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .inventory-title {
            color: white;
            font-size: 2.2rem;
            margin: 0 0 20px 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .inventory-top-bar {
            background-color: #6B4F3F;
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            gap: 15px;
        }

        .search-input {
            width: 100%;
            max-width: 350px;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 0.95rem;
            outline: none;
            box-sizing: border-box;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .add-product-btn {
            background-color: white;
            color: #6B4F3F;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 0.95rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: background-color 0.2s, opacity 0.2s;
            white-space: nowrap;
        }

        .add-product-btn:hover {
            background-color: #f0f0f0;
            opacity: 0.95;
        }

        .inventory-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .inventory-card {
            background-color: #6B4F3F;
            padding: 18px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .inventory-info {
            display: flex;
            gap: 30px;
            font-size: 1.05rem;
            font-weight: bold;
            align-items: center;
            color: white;
            flex-wrap: wrap;
        }

        .item-name {
            min-width: 180px;
        }

        .item-category {
            font-weight: normal;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .item-stats {
            font-weight: normal;
            font-size: 0.95rem;
            opacity: 0.95;
        }

        .edit-item-btn {
            background-color: #5a4234;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: background-color 0.2s, opacity 0.2s;
        }

        .edit-item-btn:hover {
            background-color: #4A3525;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .inventory-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .inventory-info {
                gap: 15px;
            }
            .inventory-action {
                width: 100%;
                text-align: right;
            }
            body.inventory-page {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="inventory-page">

    <div class="inventory-container">
        <h1 class="inventory-title">Inventory / Stock Management</h1>

        <div class="inventory-top-bar">
            <input type="text" placeholder="Search product..." class="search-input">
            <button type="button" class="add-product-btn" onclick="alert('Open Add Product Modal');">+ Add Product</button>
        </div>

        <div class="inventory-list">
            <?php foreach ($inventory_items as $item): ?>
            <!-- Inventory Item Card -->
            <div class="inventory-card">
                <div class="inventory-info">
                    <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                    <span class="item-category"><?php echo htmlspecialchars($item['category']); ?></span>
                    <span class="item-stats">Stock: <?php echo $item['stock']; ?> &nbsp;|&nbsp; Sold: <?php echo $item['sold']; ?> &nbsp;|&nbsp; Remaining: <?php echo $item['remaining']; ?></span>
                </div>
                <div class="inventory-action">
                    <button type="button" class="edit-item-btn" onclick="alert('Edit item: <?php echo $item['name']; ?>');">Edit</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>