<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Boycold Cafe - Home</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body.start-page {
            margin: 0;
            padding: 30px 20px;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            font-family: Arial, sans-serif;

            background:
                linear-gradient(
                    rgba(30, 20, 15, 0.50),
                    rgba(30, 20, 15, 0.50)
                ),
                url('images/bg.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .start-container {
            width: 100%;
            max-width: 500px;

            display: flex;
            flex-direction: column;
            align-items: center;

            text-align: center;
            gap: 24px;
        }

        .start-title {
            margin: 0;

            color: #4A3525;

            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: 2px;

            text-shadow:
                0 2px 3px rgba(255, 255, 255, 0.7),
                0 4px 8px rgba(0, 0, 0, 0.12);
        }

        .logo-circle {
            width: 190px;
            height: 190px;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #6B4F3F;
            border-radius: 50%;

            padding: 7px;

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.25),
                0 0 0 6px rgba(255, 255, 255, 0.35);
        }

        .logo-circle img {
            width: 100%;
            height: 100%;

            object-fit: contain;
            border-radius: 50%;
        }

        .login-btn-container {
            width: 100%;
            max-width: 300px;
        }

        .login-btn {
            display: block;

            width: 100%;
            padding: 15px 20px;

            background: #6B4F3F;
            color: #fff;

            text-decoration: none;

            border-radius: 8px;

            font-size: 1.05rem;
            font-weight: bold;
            letter-spacing: 0.3px;

            box-shadow:
                0 5px 12px rgba(0, 0, 0, 0.2);

            transition: all 0.25s ease;
        }

        .login-btn:hover {
            background: #563D30;

            transform: translateY(-3px);

            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.28);
        }

        .login-btn:active {
            transform: translateY(0);
            box-shadow:
                0 3px 7px rgba(0, 0, 0, 0.2);
        }

        .bottom-banner {
            margin: 4px 0 0;

            color: #4A3525;

            font-size: 0.92rem;
            font-weight: 600;

            line-height: 1.5;

            text-shadow:
                0 1px 3px rgba(255, 255, 255, 0.7);
        }

        /* Tablet */
        @media (max-width: 600px) {

            body.start-page {
                padding: 25px 18px;
            }

            .start-container {
                gap: 20px;
            }

            .start-title {
                font-size: 2.3rem;
                letter-spacing: 1.5px;
            }

            .logo-circle {
                width: 160px;
                height: 160px;
            }

            .login-btn-container {
                max-width: 280px;
            }
        }

        /* Mobile */
        @media (max-width: 400px) {

            body.start-page {
                padding: 20px 15px;
            }

            .start-title {
                font-size: 1.9rem;
                letter-spacing: 1px;
            }

            .logo-circle {
                width: 135px;
                height: 135px;
            }

            .login-btn-container {
                max-width: 260px;
            }

            .login-btn {
                padding: 13px 15px;
                font-size: 1rem;
            }

            .bottom-banner {
                font-size: 0.82rem;
                max-width: 280px;
            }
        }
    </style>
</head>

<body class="start-page">

    <div class="start-container">

        <h1 class="start-title">
            BOYCOLD CAFE
        </h1>

        <div class="logo-circle">
            <img
                src="images/boyCold logo.png"
                alt="BoyCold Cafe Logo"
            >
        </div>

        <div class="login-btn-container">
            <a href="login.php" class="login-btn">
                Login / Register
            </a>
        </div>

        <div class="bottom-banner">
            Order ahead • Choose pickup time • Receive confirmation
        </div>

    </div>

</body>
</html>