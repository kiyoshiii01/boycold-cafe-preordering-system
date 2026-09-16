<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mock user data (Pwede mong ikonekta sa database sa hinaharap)
$user = [
    'name' => 'Juan Dela Cruz',
    'email' => 'juandelacruz@example.com',
    'phone' => '09123456789',
    'pickup_preference' => 'Standard Counter Pickup',
    'photo' => 'images/default-avatar.png' // Palitan o lagyan ng dynamic image path kung meron na
];

$success_message = "";

// Mock form submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user['name'] = $_POST['name'] ?? $user['name'];
    $user['email'] = $_POST['email'] ?? $user['email'];
    $user['phone'] = $_POST['phone'] ?? $user['phone'];
    $user['pickup_preference'] = $_POST['pickup_preference'] ?? $user['pickup_preference'];
    
    $success_message = "Profile successfully updated!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - My Profile</title>
    <style>
        body.profile-page {
            margin: 0;
            padding: 40px;
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

        .profile-container {
            width: 100%;
            max-width: 900px;
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
            font-size: 2.2rem;
            margin: 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.4);
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .alert-success {
            background-color: rgba(46, 125, 50, 0.85);
            color: white;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
            background-color: #6B4F3F;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            color: white;
            align-items: center;
        }

        .profile-photo-box {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px dashed rgba(255, 255, 255, 0.4);
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 280px;
            padding: 20px;
            font-weight: bold;
            color: white;
            text-align: center;
            gap: 15px;
        }

        .profile-photo-box img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .upload-btn-label {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.2s;
        }

        .upload-btn-label:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .profile-photo-box input[type="file"] {
            display: none;
        }

        .profile-form-box {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group-profile {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group-profile label {
            color: white;
            font-weight: bold;
            font-size: 1rem;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .profile-input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }

        .profile-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .save-btn-container {
            margin-top: 10px;
        }

        .save-changes-btn {
            width: 100%;
            background-color: white;
            color: #6B4F3F;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: background-color 0.2s, opacity 0.2s;
        }

        .save-changes-btn:hover {
            background-color: #f0f0f0;
            opacity: 0.95;
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
            body.profile-page {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="profile-page">

    <div class="profile-container">
        <!-- Header & Back Link -->
        <div class="profile-header">
            <h1 class="profile-title">My Profile</h1>
            <a href="home.php" class="back-link">← Back to Menu</a>
        </div>

        <?php if (!empty($success_message)): ?>
            <div class="alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <!-- Main Profile Form -->
        <form action="profile.php" method="POST" enctype="multipart/form-data" class="profile-grid">
            
            <!-- Left Side: Profile Photo Box -->
            <div class="profile-photo-box">
                <!-- Pwede mong palitan ang src ng default image kung meron ka nang image asset -->
                <div style="font-size: 3rem;">☕</div>
                <span>[ PROFILE PHOTO ]</span>
                <label class="upload-btn-label">
                    Choose Photo
                    <input type="file" name="profile_photo" accept="image/*">
                </label>
            </div>

            <!-- Right Side: Form Fields -->
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

                <div class="save-btn-container">
                    <button type="submit" class="save-changes-btn">Save Changes</button>
                </div>
            </div>

        </form>
    </div>

</body>
</html>