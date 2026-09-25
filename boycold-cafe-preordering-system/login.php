<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $mock_users = [
        'staff@boycold.com' => ['name' => 'Staff User', 'role' => 'Staff', 'page' => 'staff_dashboard.php'],
        'sales@boycold.com' => ['name' => 'Sales User', 'role' => 'Sales', 'page' => 'sales.php'],
        'inventory@boycold.com' => ['name' => 'Inventory User', 'role' => 'Inventory', 'page' => 'inventory.php'],
        'cashier@boycold.com' => ['name' => 'Cashier User', 'role' => 'Cashier', 'page' => 'home.php']
    ];

    // Simple validation (Palitan ito ng database query tulad ng PDO o MySQLi)
    if (array_key_exists($email, $mock_users)) {
        $user = $mock_users[$email];

        $_SESSION['user'] = $user;

        switch ($user['role']) {
            case 'Sales':
                header("Location: sales.php");
                exit();
            case 'Inventory':
                header("Location: inventory.php");
                exit();
            case 'Staff':
                header("Location: staff_dashboard.php");
                exit();
            case 'Cashier':
            default:
                header("Location: home.php");
                exit();
        }
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body.form-page {
            margin: 0;
            padding: 30px 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                linear-gradient(rgba(30, 20, 15, 0.65), rgba(30, 20, 15, 0.65)),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-box-container {
            width: 100%;
            max-width: 450px;
            background: rgba(45, 30, 22, 0.82);
            padding: 40px 35px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            text-align: left;
        }

        .form-title {
            color: white;
            font-weight: 800;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            font-size: 2.5rem;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        .alert-error {
            background-color: rgba(198, 40, 40, 0.9);
            color: white;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 0.95rem;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            color: #f3e5d8;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .input-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
            font-size: 1rem;
            outline: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #8D6E63;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(141, 110, 99, 0.3);
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #8D6E63 0%, #5c3a21 100%);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.05rem;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.15);
            margin-top: 5px;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #a17f72 0%, #7b4e2d 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
            box-shadow: 0 3px 8px rgba(0,0,0,0.3);
        }

        .form-footer-link {
            text-align: center;
            margin-top: 22px;
        }

        .form-footer-link span,
        .form-footer-link a {
            color: #f3e5d8;
            font-size: 0.95rem;
        }

        .form-footer-link a {
            font-weight: 700;
            text-decoration: none;
            margin-left: 5px;
            border-bottom: 1px dashed #f3e5d8;
            transition: color 0.2s;
        }

        .form-footer-link a:hover {
            color: #ffffff;
            border-bottom-color: #ffffff;
        }

        @media (max-width: 480px) {
            body.form-page {
                padding: 20px 15px;
            }

            .form-box-container {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 2.1rem !important;
            }
        }
    </style>
</head>
<body class="form-page">

    <div class="form-box-container">

        <h1 class="form-title">Login</h1>

        <?php if (!empty($error_message)): ?>
            <div class="alert-error"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>

            <div>
                <button type="submit" class="submit-btn">
                    Log in
                </button>
            </div>

        </form>

        <div class="form-footer-link">
            <span>No account?</span>
            <a href="create_account.php">Register</a>
        </div>

    </div>

</body>
</html>