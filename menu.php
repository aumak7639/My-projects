<?php
if (isset($_SESSION['user_id'])) {
    $member = $obj->selectRow('*', 'users', 'user_id = ' . $_SESSION["user_id"]);
} else {
    $member = null;
}
?>
<header>
    <div class="header-section">
        <div class="logo">
            <a href='index.php'><img src="img/logo-1.png" /></a>
        </div>
        <div class="full-menu">
            <?php
            if (!isset($_SESSION['user_id'])) {
                ?>
                <ul>
                    <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register Now</a>
                    <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    <a href="#" class="playstore-img"><img src="img/playstore-small.png"></a>
                </ul>
            <?php } else { ?>
                <div class="login-section">
                    <a href="#" class="playstore-img">
                        <img src="img/playstore-small.png">
                    </a>
                    <div class="profile-menu-img" onclick="menu_login();">
                        <img src='<?php echo BASE_URL . $member['image_path']; ?>' alt='profile image' />
                    </div>
                    <div id="login-section" class="login-dropdown">
                        <ul>
                            <li><a href="profiles.php"><i class="fa fa-address-card"></i> Profiles</a></li>
                            <li><a href="member-profile.php"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#" onclick="logoutUser();"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="logo">
            <img src="img/logo-1.png" />
        </div>
        <i class="fa fa-bars" onclick="menu()"></i>
        <div id="menu-section" class="mobile-dropdown-menu">
            <?php
            if (!isset($_SESSION['user_id'])) {
                ?>
                <ul>
                    <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register Now</a>
                    <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    <a href="#" class="download-btn"><img src="img/playstore-small.png"></a>
                </ul>
            <?php } else { ?>
                <div class="mobile-login-section">
                    <div class="profile-mobile-menu-img">
                        <img src='<?php echo BASE_URL . $member['image_path']; ?>' alt='profile image' />
                    </div>
                    <div class="mobile-login-dropdown">
                        <ul>
                            <li><a href="profiles.php"><i class="fa fa-address-card"></i> Profiles</a></li>
                            <li><a href="member-profile.php"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#" onclick="logoutUser('<?php echo $member['user_name']; ?>');"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                    <a href="#" class="playstore-img">
                        <img src="img/playstore-small.png">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</header>