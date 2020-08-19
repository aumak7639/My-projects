<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['user_id'])) {
    $login_member = $obj->selectRow('*', 'users', 'user_id = ' . $_SESSION["user_id"]);
}
?>
<html lang="en">
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section"></div>
        <div class="change-password-secttion">
            <div class="container">
                <div class="password-section">
                    <div class="text-center">
                        <h3>Change Your Password </h3>
                    </div>
                    <form onsubmit="return changePassword(<?php echo $login_member['user_id'];  ?>);" class="reset-form">
                        <div class="form-group">
                            <input type = 'password' id = 'password' placeholder = 'New Password' required>
                        </div>
                        <div class="form-group">
                            <button type = 'submit' class = 'btn btn-primary mb-2'>Change password</button>
                <!--                <p class = 'aligncenter margintop20'>
                            Please put your registered user name. you have reset the your password...
                        </p>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>