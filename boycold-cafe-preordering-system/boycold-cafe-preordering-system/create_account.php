<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Create Account</title>
    <style>
        body.form-page {
            margin: 0;
            padding: 30px 20px;
            min-height: 100vh;
            box-sizing: border-box;

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

        .form-box-container {
            width: 100%;
            max-width: 450px;
            margin: auto;
            text-align: left;
        }

        .form-title {
            color: white;
            font-weight: bold;
            margin-bottom: 25px;
            text-align: center;
            text-shadow: 0 2px 5px rgba(0,0,0,0.4);
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            color: white;
            font-weight: bold;
            margin-bottom: 6px;
            font-size: 1rem;
        }

        .input-group input {
            width: 100%;
            padding: 14px;
            border: 2px solid transparent;
            border-radius: 8px;
            background: white;
            color: #333;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }

        .input-group input:focus {
            border-color: #6B4F3F;
        }

        .submit-btn {
            width: 100%;
            background-color: #6B4F3F;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
        }

        .submit-btn:hover {
            background-color: #4A3525;
        }

        .form-footer-link {
            text-align: center;
            margin-top: 18px;
        }

        .form-footer-link span,
        .form-footer-link a {
            color: white;
        }

        .form-footer-link a {
            font-weight: bold;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            body.form-page {
                padding: 20px 15px;
            }

            .form-title {
                font-size: 2.3rem !important;
            }
        }
    </style>
</head>
<body class="form-page">

    <div class="form-box-container">

        <h1 class="form-title" style="font-size: 2.8rem;">Create Account</h1>

        <form action="#" method="POST">
            
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="Enter full name" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="input-group">
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="Enter phone number" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Confirm password" required>
            </div>

            <div style="margin-top: 25px;">
                <button type="submit" class="submit-btn">
                    Register
                </button>
            </div>

        </form>

        <div class="form-footer-link">
            <a href="login.php">← Back to Login</a>
        </div>

    </div>

</body>
</html>