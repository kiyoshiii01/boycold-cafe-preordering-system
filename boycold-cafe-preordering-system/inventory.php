<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        * {
            box-sizing: border-box;
        }

        body.inventory-page {
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

        .inventory-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .inventory-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .inventory-title {
            color: white;
            font-size: 2rem;
            margin: 0;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .logout-btn {
            background: linear-gradient(135deg, #d9534f 0%, #c9302c 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #c9302c 0%, #ac2925 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .inventory-top-bar {
            background: rgba(45, 30, 22, 0.85);
            padding: 20px 25px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            gap: 15px;
        }

        .search-input {
            width: 100%;
            max-width: 350px;
            padding: 12px 18px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .search-input:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.35);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .add-product-btn {
            background: linear-gradient(135deg, #f3e5d8 0%, #e2d2c3 100%);
            color: #5c3a21;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.95rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .add-product-btn:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .inventory-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .inventory-card {
            background: rgba(45, 30, 22, 0.85);
            padding: 20px 25px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .inventory-info {
            display: flex;
            gap: 25px;
            font-size: 1rem;
            align-items: center;
            color: white;
            flex-wrap: wrap;
        }

        .item-name {
            min-width: 160px;
            font-weight: 700;
            font-size: 1.05rem;
        }

        .item-category {
            font-weight: 600;
            background-color: rgba(255, 255, 255, 0.08);
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #e0d0c0;
        }

        .item-stats {
            font-weight: 600;
            font-size: 0.95rem;
            color: #f3e5d8;
        }

        .edit-item-btn {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .edit-item-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }

        @media (max-width: 768px) {
            .inventory-card {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }
            .inventory-info {
                gap: 15px;
            }
            .inventory-action {
                width: 100%;
            }
            .edit-item-btn {
                width: 100%;
            }
            .inventory-top-bar {
                flex-direction: column;
                align-items: stretch;
            }
            .search-input {
                max-width: 100%;
            }
            body.inventory-page {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="inventory-page">

    <div class="inventory-container">

        <div class="inventory-header-top">
            <h1 class="inventory-title">Inventory / Stock Management</h1>
            <a href="logout.php?redirect=inventory" class="logout-btn">Logout</a>
        </div>

        <div class="inventory-top-bar">
            <input type="text" placeholder="Search product..." class="search-input">
            <button type="button" class="add-product-btn" onclick="alert('Open Add Product Modal');">+ Add Product</button>
        </div>

        <div class="inventory-list">
            <?php foreach ($inventory_items as $item): ?>

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