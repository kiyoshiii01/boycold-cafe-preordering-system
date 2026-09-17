<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$staff_orders = [
    ['id' => 'BC-0001', 'customer' => 'Juan Dela Cruz', 'price' => 300.00, 'status' => 'Pending'],
    ['id' => 'BC-0002', 'customer' => 'Maria Santos', 'price' => 180.00, 'status' => 'Confirmed'],
    ['id' => 'BC-0003', 'customer' => 'Pedro Penduko', 'price' => 250.00, 'status' => 'Preparing'],
    ['id' => 'BC-0004', 'customer' => 'Clara Reyes', 'price' => 420.00, 'status' => 'Ready'],
    ['id' => 'BC-0005', 'customer' => 'Jose Rizal', 'price' => 220.00, 'status' => 'Pending']
];

// Kunin ang kasalukuyang filter mula sa URL, default sa 'All'
$current_filter = $_GET['status'] ?? 'All';

// Salain ang mga order batay sa piniling status
$filtered_orders = array_filter($staff_orders, function($order) use ($current_filter) {
    if ($current_filter === 'All') {
        return true;
    }
    return strcasecmp($order['status'], $current_filter) === 0;
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Staff Dashboard</title>
    <style>
        body.staff-dashboard-page {
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

        .staff-container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .staff-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .staff-title {
            color: white;
            font-size: 2.2rem;
            margin: 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .logout-btn {
            background-color: #a93226;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            transition: background-color 0.2s, opacity 0.2s;
        }

        .logout-btn:hover {
            background-color: #922b21;
        }

        .staff-search-box {
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .staff-filter-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-btn {
            background-color: rgba(107, 79, 63, 0.85);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.2s, opacity 0.2s;
            font-size: 0.95rem;
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: #6B4F3F;
            border-color: white;
            opacity: 1;
        }

        .staff-orders-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .staff-order-card {
            background-color: #6B4F3F;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .staff-order-info {
            display: flex;
            align-items: center;
            gap: 25px;
            flex-grow: 1;
            flex-wrap: wrap;
        }

        .staff-order-id {
            font-size: 1.1rem;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 4px;
        }

        .staff-customer-name {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .staff-order-price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #ffd700;
        }

        .staff-order-status {
            font-size: 0.95rem;
            opacity: 0.9;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 3px 8px;
            border-radius: 4px;
        }

        .no-orders-msg {
            background-color: #6B4F3F;
            color: white;
            padding: 25px;
            text-align: center;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
        }

        .update-status-btn {
            background-color: white;
            color: #6B4F3F;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: background-color 0.2s, opacity 0.2s;
            white-space: nowrap;
        }

        .update-status-btn:hover {
            background-color: #f0f0f0;
            opacity: 0.95;
        }

        @media (max-width: 768px) {
            .staff-order-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .staff-action-right {
                width: 100%;
                text-align: right;
            }
            body.staff-dashboard-page {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="staff-dashboard-page">

    <div class="staff-container">
        <!-- Header with Title and Logout Button -->
        <div class="staff-header-top">
            <h1 class="staff-title">Staff Dashboard — Orders</h1>
            <a href="logout.php?redirect=staff" class="logout-btn">Logout</a>
        </div>

        <div class="staff-search-box">
            <input type="text" placeholder="Search order by ID or customer name..." class="search-input">
        </div>

        <div class="staff-filter-buttons">
            <a href="?status=All" class="filter-btn <?php echo ($current_filter === 'All') ? 'active' : ''; ?>">All</a>
            <a href="?status=Pending" class="filter-btn <?php echo ($current_filter === 'Pending') ? 'active' : ''; ?>">Pending</a>
            <a href="?status=Confirmed" class="filter-btn <?php echo ($current_filter === 'Confirmed') ? 'active' : ''; ?>">Confirmed</a>
            <a href="?status=Preparing" class="filter-btn <?php echo ($current_filter === 'Preparing') ? 'active' : ''; ?>">Preparing</a>
            <a href="?status=Ready" class="filter-btn <?php echo ($current_filter === 'Ready') ? 'active' : ''; ?>">Ready</a>
        </div>

        <div class="staff-orders-list">
            <?php if (!empty($filtered_orders)): ?>
                <?php foreach ($filtered_orders as $order): ?>
                <!-- Order Card -->
                <div class="staff-order-card">
                    <div class="staff-order-info">
                        <span class="staff-order-id"><?php echo htmlspecialchars($order['id']); ?></span>
                        <span class="staff-customer-name"><?php echo htmlspecialchars($order['customer']); ?></span>
                        <span class="staff-order-price">₱<?php echo number_format($order['price'], 2); ?></span>
                        <span class="staff-order-status">Status: <?php echo htmlspecialchars($order['status']); ?></span>
                    </div>
                    <div class="staff-action-right">
                        <button type="button" class="update-status-btn" onclick="alert('Update status for <?php echo $order['id']; ?>');">Update Status</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-orders-msg">No orders found with status "<?php echo htmlspecialchars($current_filter); ?>".</div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>