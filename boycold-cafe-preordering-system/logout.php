<?php
session_start();

// Alamin kung saan babalik kapag nag-cancel
$redirect_page = 'home.php';
if (isset($_GET['redirect'])) {
    if ($_GET['redirect'] === 'sales') {
        $redirect_page = 'sales.php';
    } elseif ($_GET['redirect'] === 'staff') {
        $redirect_page = 'staff_dashboard.php';
    } elseif ($_GET['redirect'] === 'inventory') {
        $redirect_page = 'inventory.php'; // Updated para sa inventory
    }
}

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
    header("Location: start.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Logout Confirmation</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body.logout-confirm-page {
            margin: 0;
            padding: 0;
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

        .confirm-card {
            background: rgba(45, 30, 22, 0.85);
            padding: 35px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            text-align: center;
            color: white;
            max-width: 420px;
            width: 90%;
        }

        .confirm-card h2 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .confirm-card p {
            margin-bottom: 25px;
            font-size: 1.05rem;
            color: #e0d0c0;
            line-height: 1.4;
        }

        .confirm-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .btn-yes {
            background: linear-gradient(135deg, #d9534f 0%, #c9302c 100%);
            color: white;
        }

        .btn-yes:hover {
            background: linear-gradient(135deg, #c9302c 0%, #ac2925 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.12);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body class="logout-confirm-page">

    <div class="confirm-card">
        <h2>Logout Confirmation</h2>
        <p>Are you sure you want to log out of Boycold Cafe?</p>
        <div class="confirm-buttons">
            <a href="logout.php?confirm=yes" class="btn btn-yes">Yes</a>
            <a href="<?php echo $redirect_page; ?>" class="btn btn-cancel">Cancel</a>
        </div>
    </div>

</body>
</html>