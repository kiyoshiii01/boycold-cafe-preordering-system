<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - My Profile</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body class="profile-page">

    <div class="profile-container">
        <!-- Header & Back Link -->
        <div class="profile-header">
            <h1 class="profile-title">My Profile</h1>
            <a href="home.php" class="back-link">← Back to Menu</a>
        </div>

        <!-- Main Profile Grid Layout -->
        <div class="profile-grid">
            
            <!-- Left Side: Profile Photo Box -->
            <div class="profile-photo-box">
                <span>[ PROFILE PHOTO ]</span>
            </div>

            <!-- Right Side: Form Fields -->
            <div class="profile-form-box">
                <div class="form-group-profile">
                    <label>Full Name</label>
                    <input type="text" placeholder="" class="profile-input">
                </div>

                <div class="form-group-profile">
                    <label>Email</label>
                    <input type="email" placeholder="" class="profile-input">
                </div>

                <div class="form-group-profile">
                    <label>Phone Number</label>
                    <input type="text" placeholder="" class="profile-input">
                </div>

                <div class="form-group-profile">
                    <label>Pickup Preference</label>
                    <input type="text" placeholder="" class="profile-input">
                </div>

                <div class="save-btn-container">
                    <button type="button" class="save-changes-btn">Save Changes</button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>