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

$current_filter = $_GET['status'] ?? 'All';

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
        * {
            box-sizing: border-box;
        }

        body.staff-dashboard-page {
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

        .staff-container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .staff-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .staff-title {
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

        .staff-search-box {
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
            backdrop-filter: blur(5px);
            transition: all 0.2s ease;
        }

        .search-input:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.35);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .staff-filter-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: rgba(45, 30, 22, 0.6);
            color: #f3e5d8;
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            backdrop-filter: blur(5px);
        }

        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateY(-1px);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #f3e5d8 0%, #e2d2c3 100%);
            color: #5c3a21;
            border-color: transparent;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .staff-orders-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .staff-order-card {
            background: rgba(45, 30, 22, 0.85);
            padding: 22px 25px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .staff-order-info {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-grow: 1;
            flex-wrap: wrap;
        }

        .staff-order-id {
            font-size: 1rem;
            font-weight: 700;
            background-color: rgba(255, 255, 255, 0.12);
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .staff-customer-name {
            font-size: 1.05rem;
            font-weight: 700;
            color: white;
        }

        .staff-order-price {
            font-size: 1.05rem;
            font-weight: 700;
            color: #f3e5d8;
        }

        .staff-order-status {
            font-size: 0.95rem;
            color: #e0d0c0;
            background-color: rgba(255, 255, 255, 0.08);
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .no-orders-msg {
            background: rgba(45, 30, 22, 0.85);
            color: #f3e5d8;
            padding: 30px;
            text-align: center;
            border-radius: 16px;
            font-size: 1.05rem;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
        }

        .update-status-btn {
            background: linear-gradient(135deg, #f3e5d8 0%, #e2d2c3 100%);
            color: #5c3a21;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .update-status-btn:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            .staff-order-card {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }
            .staff-action-right {
                width: 100%;
            }
            .update-status-btn {
                width: 100%;
            }
            body.staff-dashboard-page {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="staff-dashboard-page">

    <div class="staff-container">

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
                        <span class="staff-order-price">&#8369;<?php echo number_format($order['price'], 2); ?></span>
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