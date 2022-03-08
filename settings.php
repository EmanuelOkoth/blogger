<?php
session_start();
$page = 'settings';
require 'include/head.php';
require 'auth/check_login.php';
require 'auth/db_connection.php';
require 'auth/user_settings.php';
?>

  <body>
    <!-- navbar -->
    <?php
      require './include/navbar.php'
    ?>
    <main class="app__layout">
        <div class="container">
            <!-- Main Content Start -->
            <div class="app__settings">
                <h1 class="app__settings-heading">User Settings</h1>

                <div class="user-details">
                    <h3>Username : <span><?php echo $userData['username']; ?></span></h3>
                    <h3>Email Address : <span><?php echo $userData['email']; ?></span></h3>
                </div>

                <!-- error and success messages -->
                <?php
                if(isset($success_message)){
                    echo '<div class="success_message">'.$success_message.'</div>'; 
                }
                if(isset($error_message)){
                    echo '<div class="error_message">'.$error_message.'</div>'; 
                }
                ?>

                <div class="app__settings-forms">
                    <!-- change email address -->
                    <div class="app__settings-form change-email-section">
                        <h2>Change Email Address</h2>
                        <div class="change-email-form">
                            <form action="" method="post">

                                <div class="form__group">
                                    <label for="email">New Email Address</label>
                                    <input id="email" name="email" type="text" placeholder="Enter New Email Address" />
                                </div>

                                <button class="btn btn--main" type="submit">Update Email</button>

                            </form>
                        </div>
                    </div>

                    <!-- change password -->
                    <div class="app__settings-form change-email-section">
                        <h2>Change Password</h2>
                        <div class="change-password-form">
                            <form action="" method="post">

                                <div class="form__group">
                                    <label for="password">New Password</label>
                                    <input id="password" name="password" type="password" placeholder="Enter New Password" />
                                </div>

                                <div class="form__group">
                                    <label for="password2">Confirm New Password</label>
                                    <input id="password2" name="password2" type="password" placeholder="Enter New Password Confirmation" />
                                </div>

                                <button class="btn btn--main" type="submit">Update Password</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!--  Main Content End -->
        </div>
    </main>
</body>
