<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Sales Dashboard</title>
    <link rel="stylesheet" href="css/style.css?v=3">
</head>
<body class="sales-dashboard-page">

    <div class="sales-container">
        <!-- Title -->
        <h1 class="sales-title">Sales Dashboard</h1>

        <!-- Top Metric Cards Grid -->
        <div class="sales-metrics-grid">
            <div class="metric-card">
                <span class="metric-label">Today</span>
                <span class="metric-value">₱5,240</span>
            </div>
            <div class="metric-card">
                <span class="metric-label">This Week</span>
                <span class="metric-value">₱31,500</span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Orders</span>
                <span class="metric-value">128</span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Top Product</span>
                <span class="metric-value-text">Iced Coffee</span>
            </div>
        </div>

        <!-- Sales Chart Placeholder Box -->
        <div class="sales-chart-box">
            <span>[ SALES CHART PLACEHOLDER ]</span>
        </div>
    </div>

</body>
</html>