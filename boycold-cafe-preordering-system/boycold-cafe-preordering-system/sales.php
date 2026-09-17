<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sales_data = [
    'today' => 5240.00,
    'this_week' => 31500.00,
    'orders_count' => 128,
    'top_product' => 'Iced Coffee'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Sales Dashboard</title>
    <style>
        body.sales-dashboard-page {
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

        .sales-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .sales-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .sales-title {
            color: white;
            font-size: 2.2rem;
            margin: 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .nav-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-btn {
            background-color: #6B4F3F;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            transition: background-color 0.2s, opacity 0.2s;
        }

        .nav-btn:hover {
            background-color: #4A3525;
            opacity: 0.95;
        }

        .logout-btn {
            background-color: #a93226;
        }

        .logout-btn:hover {
            background-color: #922b21;
        }

        .sales-metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .metric-card {
            background-color: #6B4F3F;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: white;
            text-align: left;
        }

        .metric-label {
            font-size: 0.95rem;
            font-weight: bold;
            color: white;
            opacity: 0.9;
        }

        .metric-value {
            font-size: 1.6rem;
            font-weight: bold;
            color: white;
        }

        .metric-value-text {
            font-size: 1.3rem;
            font-weight: bold;
            color: white;
            word-break: break-word;
        }

        .sales-chart-box {
            background-color: #6B4F3F;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 250px;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            border: 2px dashed rgba(255, 255, 255, 0.4);
        }

        @media (max-width: 768px) {
            .sales-metrics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            body.sales-dashboard-page {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .sales-metrics-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="sales-dashboard-page">

    <div class="sales-container">
        <!-- Header with Title and Logout Button Only -->
        <div class="sales-header-top">
            <h1 class="sales-title">Sales Dashboard</h1>
            <div class="nav-buttons">
                <a href="logout.php?redirect=sales" class="nav-btn logout-btn">Logout</a>
            </div>
        </div>

        <div class="sales-metrics-grid">
            <div class="metric-card">
                <span class="metric-label">Today</span>
                <span class="metric-value">₱<?php echo number_format($sales_data['today'], 2); ?></span>
            </div>
            <div class="metric-card">
                <span class="metric-label">This Week</span>
                <span class="metric-value">₱<?php echo number_format($sales_data['this_week'], 2); ?></span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Orders</span>
                <span class="metric-value"><?php echo number_format($sales_data['orders_count']); ?></span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Top Product</span>
                <span class="metric-value-text"><?php echo htmlspecialchars($sales_data['top_product']); ?></span>
            </div>
        </div>

        <div class="sales-chart-box">
            <span>[ SALES CHART PLACEHOLDER ]</span>
        </div>
    </div>

</body>
</html>