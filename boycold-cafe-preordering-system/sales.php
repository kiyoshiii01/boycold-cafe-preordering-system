<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kunin ang piniling date range, default sa 'today'
$selected_range = $_GET['range'] ?? 'today';
$valid_ranges = ['today', 'week', 'month', 'year'];
if (!in_array($selected_range, $valid_ranges)) {
    $selected_range = 'today';
}

// Mock data para sa bawat range (Palitan mo ito ng database query later)
$sales_data_sets = [
    'today' => [
        'label' => 'Today',
        'total' => 5240.00,
        'orders_count' => 42,
        'top_product' => 'Caramel Macchiato',
        'chart_title' => "Today's Sales by Hour",
        'chart_data' => [
            '8AM' => 320, '10AM' => 680, '12PM' => 1250,
            '2PM' => 890, '4PM' => 1100, '6PM' => 700, '8PM' => 300
        ]
    ],
    'week' => [
        'label' => 'This Week',
        'total' => 31500.00,
        'orders_count' => 128,
        'top_product' => 'Caramel Macchiato',
        'chart_title' => 'Weekly Sales Overview',
        'chart_data' => [
            'Mon' => 3800, 'Tue' => 4200, 'Wed' => 3950, 'Thu' => 5100,
            'Fri' => 6300, 'Sat' => 5240, 'Sun' => 2910
        ]
    ],
    'month' => [
        'label' => 'This Month',
        'total' => 128400.00,
        'orders_count' => 512,
        'top_product' => 'Spanish Latte',
        'chart_title' => 'Monthly Sales by Week',
        'chart_data' => [
            'Week 1' => 29500, 'Week 2' => 33200, 'Week 3' => 31500, 'Week 4' => 34200
        ]
    ],
    'year' => [
        'label' => 'This Year',
        'total' => 1542000.00,
        'orders_count' => 6104,
        'top_product' => 'Cafe Mocha',
        'chart_title' => 'Yearly Sales by Month',
        'chart_data' => [
            'Jan' => 98000, 'Feb' => 105000, 'Mar' => 112000, 'Apr' => 120000,
            'May' => 135000, 'Jun' => 142000, 'Jul' => 150000, 'Aug' => 138000,
            'Sep' => 128000, 'Oct' => 132000, 'Nov' => 140000, 'Dec' => 142000
        ]
    ]
];

$sales_data = $sales_data_sets[$selected_range];
$max_sale = max($sales_data['chart_data']);
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
            padding: 40px 20px;
            min-height: 100vh;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                linear-gradient(rgba(30, 20, 15, 0.65), rgba(30, 20, 15, 0.65)),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .sales-container {
            width: 100%;
            max-width: 1050px;
            margin: 0 auto;
        }

        .sales-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.15);
            padding-bottom: 15px;
        }

        .sales-title {
            color: #ffffff;
            font-size: 2.4rem;
            margin: 0;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 6px rgba(0,0,0,0.5);
        }

        .nav-buttons {
            display: flex;
            gap: 10px;
        }

        .nav-btn {
            background-color: #5c3a21;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background-color: #7b4e2d;
            transform: translateY(-2px);
        }

        .logout-btn {
            background-color: #c0392b;
        }

        .logout-btn:hover {
            background-color: #e74c3c;
        }

        /* Date Range Selector */
        .range-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .range-btn {
            background-color: rgba(255, 255, 255, 0.9);
            color: #4A3525;
            padding: 10px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            transition: all 0.25s ease;
        }

        .range-btn:hover {
            background-color: #ffffff;
            transform: translateY(-2px);
        }

        .range-btn.active {
            background-color: #5c3a21;
            color: white;
            box-shadow: 0 4px 12px rgba(92, 58, 33, 0.4);
        }

        .sales-metrics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .metric-card {
            background: linear-gradient(135deg, #6B4F3F 0%, #4A3525 100%);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;
            gap: 12px;
            color: white;
            border: 1px solid rgba(255,255,255,0.1);
            transition: transform 0.3s ease;
        }

        .metric-card:hover {
            transform: translateY(-4px);
        }

        .metric-label {
            font-size: 0.95rem;
            font-weight: 600;
            color: #f3e5d8;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .metric-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
        }

        .metric-value-text {
            font-size: 1.4rem;
            font-weight: 700;
            color: #ffffff;
            word-break: break-word;
        }

        .sales-chart-box {
            background: linear-gradient(135deg, #6B4F3F 0%, #4A3525 100%);
            padding: 30px 40px 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            color: white;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .chart-title {
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 25px;
            color: #f3e5d8;
            letter-spacing: 0.5px;
        }

        .bar-chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 15px;
            height: 240px;
            padding-top: 10px;
        }

        .bar-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            height: 100%;
        }

        .bar-value {
            font-size: 0.7rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #f3e5d8;
            white-space: nowrap;
        }

        .bar {
            width: 100%;
            max-width: 50px;
            background: linear-gradient(to top, #d7ccc8, #ffffff);
            border-radius: 6px 6px 0 0;
            transition: height 0.4s ease, background-color 0.2s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .bar:hover {
            background: linear-gradient(to top, #ffffff, #ffecb3);
        }

        .bar-label {
            margin-top: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #f3e5d8;
        }

        @media (max-width: 768px) {
            .sales-metrics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            body.sales-dashboard-page {
                padding: 20px 10px;
            }
            .bar-value {
                font-size: 0.6rem;
            }
            .bar-label {
                font-size: 0.75rem;
            }
            .range-btn {
                padding: 8px 14px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .sales-metrics-grid {
                grid-template-columns: 1fr;
            }
            .bar-chart {
                height: 180px;
                gap: 6px;
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

        <!-- Date Range Selector -->
        <div class="range-selector">
            <a href="?range=today" class="range-btn <?php echo $selected_range === 'today' ? 'active' : ''; ?>">Today</a>
            <a href="?range=week" class="range-btn <?php echo $selected_range === 'week' ? 'active' : ''; ?>">This Week</a>
            <a href="?range=month" class="range-btn <?php echo $selected_range === 'month' ? 'active' : ''; ?>">This Month</a>
            <a href="?range=year" class="range-btn <?php echo $selected_range === 'year' ? 'active' : ''; ?>">This Year</a>
        </div>

        <div class="sales-metrics-grid">
            <div class="metric-card">
                <span class="metric-label"><?php echo htmlspecialchars($sales_data['label']); ?> Sales</span>
                <span class="metric-value">₱<?php echo number_format($sales_data['total'], 2); ?></span>
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
            <div class="chart-title"><?php echo htmlspecialchars($sales_data['chart_title']); ?></div>
            <div class="bar-chart">
                <?php foreach ($sales_data['chart_data'] as $period => $amount):
                    $height_percent = ($amount / $max_sale) * 100;
                ?>
                    <div class="bar-column">
                        <span class="bar-value">₱<?php echo number_format($amount); ?></span>
                        <div class="bar" style="height: <?php echo $height_percent; ?>%;"></div>
                        <span class="bar-label"><?php echo $period; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>
</html>