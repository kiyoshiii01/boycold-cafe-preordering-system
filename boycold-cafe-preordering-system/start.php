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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                linear-gradient(
                    rgba(30, 20, 15, 0.65),
                    rgba(30, 20, 15, 0.65)
                ),
                url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .start-container {
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 24px;
            background: rgba(45, 30, 22, 0.75);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
        }

        .start-title {
            margin: 0;
            color: #ffffff;
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
        }

        .logo-circle {
            width: 180px;
            height: 180px;
            background:
                #6B4F3F
                url('images/boycold logo.png')
                no-repeat
                center / contain;
            border-radius: 50%;
            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.35),
                0 0 0 5px rgba(255, 255, 255, 0.2);
        }
        }

        .login-btn-container {
            width: 100%;
            max-width: 300px;
        }

        .login-btn {
            display: block;
            width: 100%;
            padding: 15px 20px;
            background: linear-gradient(135deg, #8D6E63 0%, #5c3a21 100%);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #a17f72 0%, #7b4e2d 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        }

        .bottom-banner {
            margin: 4px 0 0;
            color: #f3e5d8;
            font-size: 0.92rem;
            font-weight: 600;
            line-height: 1.5;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        /* Tablet */
        @media (max-width: 600px) {
            body.start-page {
                padding: 25px 18px;
            }

            .start-container {
                padding: 30px 20px;
                gap: 20px;
            }

            .start-title {
                font-size: 2.1rem;
                letter-spacing: 1px;
            }

            .logo-circle {
                width: 150px;
                height: 150px;
            }

            .login-btn-container {
                max-width: 280px;
            }
        }

        /* Mobile */
        @media (max-width: 400px) {
            .start-title {
                font-size: 1.8rem;
            }

            .logo-circle {
                width: 130px;
                height: 130px;
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
            }
        }
    </style>
</head>

<body class="start-page">

    <div class="start-container">

        <h1 class="start-title">
            BOYCOLD CAFE
        </h1>

        <div class="logo-circle"></div>

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