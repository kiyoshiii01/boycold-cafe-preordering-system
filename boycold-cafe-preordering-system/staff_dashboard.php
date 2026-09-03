<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Staff Dashboard</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body class="staff-dashboard-page">

    <div class="staff-container">
        <!-- Title -->
        <h1 class="staff-title">Staff Dashboard — Orders</h1>

        <!-- Search Bar & Filters Preview -->
        <div class="staff-search-box">
            <span>Search Order   Filter: All   Date: Today</span>
        </div>

        <!-- Status Filter Buttons -->
        <div class="staff-filter-buttons">
            <button type="button" class="filter-btn">Pending</button>
            <button type="button" class="filter-btn">Confirmed</button>
            <button type="button" class="filter-btn">Preparing</button>
            <button type="button" class="filter-btn">Ready</button>
        </div>

        <!-- Orders List -->
        <div class="staff-orders-list">
            
            <?php for ($i = 1; $i <= 4; $i++): ?>
            <!-- Order Card -->
            <div class="staff-order-card">
                <div class="staff-order-info">
                    <span class="staff-order-id">#BC-000<?php echo $i; ?></span>
                    <span class="staff-customer-name">Customer Name</span>
                    <span class="staff-order-price">₱300</span>
                </div>
                <div class="staff-action-right">
                    <button type="button" class="update-status-btn">Update Status</button>
                </div>
            </div>
            <?php endfor; ?>

        </div>
    </div>

</body>
</html>