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
                <!--<li data-target="#myCarousel" data-slide-to="3"></li>-->
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

                <!--                <div class="item">
                                    <img src="https://alkite.files.wordpress.com/2009/05/surfing-1.jpg" alt="Banner">
                                                        <div class="carousel-caption">
                                                            <h3>Flowers</h3>
                                                            <p>Beatiful flowers in Kolymbari, Crete.</p>
                                                        </div>
                                </div>-->
            </div>
            <div class="register-btn-section">
                <a href="#" class="btn" data-toggle="modal" data-target="#myModal"><blink><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register Now</blink></a>
            </div>
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
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4><?php echo $row['name']; ?></h4>
                                <p>Height: <?php echo $row['height']; ?></p>
                                <p>Weight: <?php echo $row['weight']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
<!--                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="partner-box" data-toggle="modal" data-target="#myModal">
                            <div class="partner-bg" style="background: url(img/slide-img.jpg)no-repeat;"></div>
                            <div class="partner-content">
                                <h4>Name Comes Here</h4>
                                <p>Height: </p>
                                <p>Weight: </p>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

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
        <?php include 'register-form.php'; ?>
        <?php include 'login.php'; ?>
        <?php include 'footer.php'; ?>
    </body>
</html>