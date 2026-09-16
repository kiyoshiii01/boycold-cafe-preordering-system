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

        .sales-title {
            color: white;
            font-size: 2.2rem;
            margin: 0 0 25px 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
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
        <!-- Title -->
        <h1 class="sales-title">Sales Dashboard</h1>

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