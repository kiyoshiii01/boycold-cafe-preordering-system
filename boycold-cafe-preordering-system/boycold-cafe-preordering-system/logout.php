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
        body.logout-confirm-page {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background:
                linear-gradient(rgba(30, 20, 15, 0.48), rgba(30, 20, 15, 0.48)),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .confirm-card {
            background-color: #6B4F3F;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
            text-align: center;
            color: white;
            max-width: 400px;
            width: 90%;
        }

        .confirm-card h2 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .confirm-card p {
            margin-bottom: 25px;
            font-size: 1rem;
            opacity: 0.9;
        }

        .confirm-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            padding: 10px 24px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.2s, opacity 0.2s;
            border: none;
        }

        .btn-yes {
            background-color: #a93226;
            color: white;
        }

        .btn-yes:hover {
            background-color: #922b21;
        }

        .btn-cancel {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-cancel:hover {
            background-color: white;
            color: #6B4F3F;
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