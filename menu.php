<?php
if (isset($_SESSION['user_id'])) {
    $member = $obj->selectRow('*', 'users', 'user_id = ' . $_SESSION["user_id"]);
}
?>
<header>
    <div class="header-section">
        <div class="logo">
            <a href='index'><img src="img/logo-1.png" /></a>
        </div>
        <div class="full-menu">
            <?php if (!isset($_SESSION['user_id'])) { ?>
                <ul>
                    <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register Now</a>
                    <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    <a href="#" class="playstore-img"><img src="img/playstore-small.png"></a>
                </ul>
            <?php } else { ?>
                <div class="login-section">
                    <img src='<?php echo BASE_URL . $row['image_path']; ?>' alt='profile image' />
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
            <ul>
                <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register Now</a>
                <a href="#" class="btn btn-sm animated-button victoria-two" data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                <a href="#" class="download-btn"><img src="img/playstore-small.png"></a>
            </ul>
        </div>
    </div>
</header>