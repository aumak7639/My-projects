<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();

$user = $obj->selectAll('*', 'users', 'user_id > 0');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img src="img/banner-1.jpg" alt="Banner">
                </div>

                <div class="item">
                    <img src="img/banner-2.jpg" alt="Banner">
                </div>

                <div class="item">
                    <img src="img/banner-3.jpg" alt="Banner">
                </div>
            </div>
            <?php if (!isset($_SESSION['user_id'])) { ?>
                <div class="register-btn-section">
                    <a href="#" class="btn" data-toggle="modal" data-target="#myModal"><blink><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register Now</blink></a>
                </div>
            <?php } else { ?> 
                <div class="register-btn-section" style="display: none">
                    <a href="#" class="btn" data-toggle="modal" data-target="#myModal"><blink><i class="fa fa-user-circle-o" aria-hidden="true"></i> Test</blink></a>
                </div>
            <?php } ?>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <i class="glyphicon fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <i class="glyphicon fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="slider-section">
            <div class="container">
                <!--<h2>Our  Partners</h2>-->
                <div class="customer-logos slider">
                    <?php foreach ($user as $row) { ?>
                        <?php if (isset($_SESSION['user_id'])) { ?>
                            <div class="slide">
                                <div class="partner-box" onclick="window.location = 'user-profile.php?uid=<?php echo $row['user_id']; ?>'">
                                    <div class="partner-bg" style="background: url(<?php echo BASE_URL . $row['image_path']; ?>)no-repeat;"></div>
                                    <div class="partner-content">
                                        <h4><?php echo $row['name']; ?></h4>
                                        <p>Height: <?php echo $row['height']; ?></p>
                                        <p>Weight: <?php echo $row['weight']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="slide">
                                <div class="partner-box" data-toggle="modal" data-target="#myModal">
                                    <div class="partner-bg" style="background: url(<?php echo BASE_URL . $row['image_path']; ?>)no-repeat;"></div>
                                    <div class="partner-content">
                                        <h4><?php echo $row['name']; ?></h4>
                                        <p>Height: <?php echo $row['height']; ?></p>
                                        <p>Weight: <?php echo $row['weight']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <br/>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <center><a href="profiles" class="btn profile-btn">See More</a></center>
                <?php } else { ?>
                    <center><a href="#" class="btn profile-btn" data-toggle="modal" data-target="#myModal">See More</a></center>
                <?php } ?>
            </div>
        </div>
        <section class="module parallax parallax-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 mobileapp-img hidden-xs"> <img src="img/MobileAppHome.png" alt="Iniya App"> </div>
                    <div class="col-md-7 col-sm-7 parallax-caption">
                        <h2>Happiness is Just an App Away!</h2>
                        <p>Find your right match with Lovevivah.com </p>
                        <p style="font-weight:bold;"><i class="fa fa-hand-o-right"></i> Simple |  Fast | Convenient | Safe &amp; Secure</p>
                        <div class="app-download-btn">
                            <p>Available on Android</p>
                            <a href="#" target="_blank"><span class="membership-icon android-app"></span></a> </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="application-download-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title-section">
                            <h3>Download Available</h3>
                        </div>
                        <div class="download-btn"><img src="img/playstore.png"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-section">
                            <h3>Register Now</h3>
                        </div>
                        <div class="download-btn">
                            <a href="#" class="btn btn-sm animated-button victoria-two btn-custome" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if (!isset($_SESSION['user_id'])) { ?>
            <?php include 'register-form.php'; ?>
        <?php } ?>
        <?php include 'login.php'; ?>
        <?php include 'footer.php'; ?>
    </body>
</html>