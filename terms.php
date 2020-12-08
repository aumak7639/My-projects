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
                                <h3><i class="fa fa-envelope"></i> Terms & Conditions</h3>
                            </div>
                        </div>
                        <div class="card-body">

                            <p>All the information provided in this marriage information service is the information given by the customers. Management is not responsible if these are incorrect.</p>
                            <p>We only do service that connects you.</p>
                            <p>It is your job to discover what that is and to bring it about.</p>
                            <p>The photos and information uploaded in these are information provided by the customer. If any of these are incorrect you can contact our email.</p>
                            <p>Management is not responsible for any errors in this service.</p>
                        </div>

                    </div>
                </div>
                <!--Grid column-->

            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>