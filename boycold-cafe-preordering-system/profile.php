<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user = [
    'name' => 'Juan Dela Cruz',
    'email' => 'juandelacruz@example.com',
    'phone' => '09123456789',
    'pickup_preference' => 'Standard Counter Pickup',
    'photo' => 'images/profile.png'
];

$success_message = "";

// Mock form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user['name'] = $_POST['name'] ?? $user['name'];
    $user['email'] = $_POST['email'] ?? $user['email'];
    $user['phone'] = $_POST['phone'] ?? $user['phone'];
    $user['pickup_preference'] = $_POST['pickup_preference'] ?? $user['pickup_preference'];
    
    // Password change handler
    $new_password = $_POST['new_password'] ?? '';

    if (!empty($new_password)) {
        // Dito mo ilalagay ang database update query para sa bagong password
        $success_message = "Profile and password successfully updated!";
    } else {
        $success_message = "Profile successfully updated!";
    }
    
    // Handle profile photo upload if provided
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['profile_photo']['tmp_name'];
        $file_name = $_FILES['profile_photo']['name'];
        $upload_file_dir = 'images/';
        
        $dest_path = $upload_file_dir . basename($file_name);
        
        if(move_uploaded_file($file_tmp_path, $dest_path)) {
            $user['photo'] = $dest_path;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - My Profile</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body.profile-page {
            margin: 0;
            padding: 40px;
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

        .profile-container {
            width: 100%;
            max-width: 950px;
            margin: 0 auto;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .profile-title {
            color: white;
            font-size: 2rem;
            margin: 0;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-link {
            color: #f3e5d8;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: white;
            text-decoration: underline;
        }

        .alert-success {
            background-color: rgba(46, 125, 50, 0.9);
            color: white;
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
            background: rgba(45, 30, 22, 0.85);
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            color: white;
            align-items: stretch;
        }

        /* Profile Photo Box Styling */
        .profile-photo-box {
            position: relative;
            background-color: rgba(255, 255, 255, 0.05);
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            min-height: 100%;
            height: 100%;
            min-height: 340px; /* Ginawa itong saktong box */
            padding: 20px;
            box-sizing: border-box;
        }

        .profile-photo-box img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            z-index: 1;
        }

        .upload-btn-label {
            position: relative;
            z-index: 2;
            background-color: rgba(0, 0, 0, 0.75);
            color: white;
            padding: 12px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 600;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.2s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .upload-btn-label:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .profile-photo-box input[type="file"] {
            display: none;
        }

        .profile-form-box {
            display: flex;
            flex-direction: column;
            gap: 18px;
            justify-content: space-between;
        }

        .form-group-profile {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group-profile label {
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .profile-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .profile-input:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.35);
        }

        .profile-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .save-btn-container {
            margin-top: 5px;
        }

        .save-changes-btn {
            width: 100%;
            background: linear-gradient(135deg, #f3e5d8 0%, #e2d2c3 100%);
            color: #5c3a21;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            text-align: center;
            transition: all 0.3s ease;
        }

        .save-changes-btn:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
                padding: 25px;
            }
            body.profile-page {
                padding: 20px;
            }
            .profile-photo-box {
                min-height: 280px;
            }
        }
    </style>
</head>
<body class="profile-page">

    <div class="profile-container">
        <!-- Header & Back Link -->
        <div class="profile-header">
            <h1 class="profile-title">My Profile</h1>
            <a href="home.php" class="back-link">&larr; Back to Menu</a>
        </div>

        <?php if (!empty($success_message)): ?>
            <div class="alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <form action="profile.php" method="POST" enctype="multipart/form-data" class="profile-grid">

            <div class="profile-photo-box">
                <img src="<?php echo htmlspecialchars($user['photo']); ?>" alt="Profile Photo">
                <label class="upload-btn-label">
                    Choose Photo
                    <input type="file" name="profile_photo" accept="image/*">
                </label>
            </div>

            <div class="profile-form-box">
                <div class="form-group-profile">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="profile-input" required>
                </div>

                <div class="form-group-profile">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="profile-input" required>
                </div>

                <div class="form-group-profile">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" class="profile-input" required>
                </div>

                <div class="form-group-profile">
                    <label for="pickup_preference">Pickup Preference</label>
                    <input type="text" id="pickup_preference" name="pickup_preference" value="<?php echo htmlspecialchars($user['pickup_preference']); ?>" class="profile-input">
                </div>

                <div class="form-group-profile">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" placeholder="Leave blank to keep current password" class="profile-input">
                </div>

                <div class="save-btn-container">
                    <button type="submit" class="save-changes-btn">Save Changes</button>
                </div>
            </div>

        </form>
    </div>

</body>
</html>