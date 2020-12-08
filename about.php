<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section"></div>
        <section class="container mt-5">
            <!--Contact heading-->
            <div class="row">
                <!--Grid column-->
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <!--Form with header-->
                    <div class="card border-primary rounded-0">
                        <div class="card-header m-b-10">
                            <div class="bg-primary text-white text-center py-2 ptb-1">
                                <h3>About Us</h3>
                            </div>
                        </div>
                        <div class="card-body">

                            <p>We have been doing this service for 15 years. We have a lot of wedding information for you to choose from.. We kindly ask you to upload real information for the benefit of this service.</p>
                        </div>

                    </div>
                </div>
                <!--Grid column-->

            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>