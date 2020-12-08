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
                <div class="col-sm-12 mb-4 col-md-5">
                    <!--Form with header-->
                    <div class="card border-primary rounded-0">
                        <div class="card-header m-b-10">
                            <div class="bg-primary text-white text-center py-2 ptb-1">
                                <h3><i class="fa fa-envelope"></i> Write to us:</h3>
                                <p class="m-0">We’ll write rarely, but only the best content.</p>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label> Your name </label>

                                <input value="" type="text" name="data[name]" class="form-control" id="inlineFormInputGroupUsername" placeholder="Your name">
                            </div>
                            <div class="form-group">
                                <label>Your email</label>

                                <input type="email" value="" name="data[email]" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="data[subject]" class="form-control" id="inlineFormInputGroupUsername" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea type="text" class="form-control" rows="5" name="mesg"></textarea>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" value="submit" class="btn btn-primary btn-block rounded-0 py-2">
                            </div>

                        </div>

                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-sm-12 col-md-7">
                    <!--Buttons-->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                            <p> Your Address ….. </p>
                        </div>
                        <div class="col-md-4">
                            <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                            <p>+91 72998 35572</p>
                        </div>
                        <div class="col-md-4">
                            <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                            <p> freeiniya@gmail.com</p>
                        </div>
                    </div>
                    <!--Google map-->
                    <div class="mb-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497511.11462828395!2d79.92880522625092!3d13.04804380481973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5265ea4f7d3361%3A0x6e61a70b6863d433!2sChennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1607395218036!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <!--Grid column-->
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>