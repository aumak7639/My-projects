<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['user_id'])) {
    $myprofile = $obj->selectRow('*', 'users', 'user_id=' . $_SESSION['user_id']);
}
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section"></div>
        <div class="complaint-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h3>Complaint</h3>
                        </div>
                        <div class="complaint-form">
                            <form class="complaint">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea type="text" class="form-control" id="message" rows="4" placeholder="Enter Your Complaint" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>