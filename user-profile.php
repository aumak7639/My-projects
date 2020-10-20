<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
$uid = $_GET['uid'];
require_once 'api/include/common.php';
$obj = new Common();
$user = $obj->selectRow('*', 'users', 'user_id = ' . $uid);
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section"></div>
        <div class="user-profile-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="user-profile">
                            <div id="gallerywrapper">
                                <div id="gallery">
                                    <div id="pic1">
                                        <img src="https://unsplash.it/g/500/350?random" height="350" width="500" alt="Image 1">
                                        <a class="previous" href="#pic5"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                        <a class="next" href="#pic2"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        <h3>Image 1</h3>
                                    </div>
                                    <div id="pic2">
                                        <img src="https://unsplash.it/g/500/350" height="350" width="500" alt="Image 2">
                                        <a class="previous" href="#pic5"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                        <a class="next" href="#pic2"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        <h3>Image 2</h3>
                                    </div>
                                    <div id="pic3">
                                        <img src="https://unsplash.it/g/500/350?random" height="350" width="500" alt="Image 3">
                                        <a class="previous" href="#pic5"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                        <a class="next" href="#pic2"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        <h3>Image 3</h3>
                                    </div>
                                    <div id="pic4">
                                        <img src="https://unsplash.it/g/500/350" height="350" width="500" alt="Image 4">
                                        <a class="previous" href="#pic5"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                        <a class="next" href="#pic2"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        <h3>Image 4</h3>
                                    </div>
                                    <div id="pic5">
                                        <img src="https://unsplash.it/g/500/350?random" height="350" width="500" alt="Image 5">
                                        <a class="previous" href="#pic5"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                        <a class="next" href="#pic2"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        <h3>Image 5</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="user-details">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>:</th>
                                        <td><?php echo $user['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <th>:</th>
                                        <td><?php echo $user['age']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <th>:</th>
                                        <td><?php echo $user['date_of_birth']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <th>:</th>
                                        <td><?php echo $user['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Height</th>
                                        <th>:</th>
                                        <td><?php echo $user['height']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <th>:</th>
                                        <td><?php echo $user['weight']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Education</th>
                                        <th>:</th>
                                        <td><?php echo $user['education']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Occupation</th>
                                        <th>:</th>
                                        <td><?php echo $user['occupation']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Income</th>
                                        <th>:</th>
                                        <td><?php echo $user['income']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Caste</th>
                                        <th>:</th>
                                        <td><?php echo $user['caste']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Religion</th>
                                        <th>:</th>
                                        <td><?php echo $user['religian']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status</th>
                                        <th>:</th>
                                        <td><?php echo $user['marital_status']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <th>:</th>
                                        <td><?php echo $user['location']; ?></td>
                                    </tr>
                                </table>
                                <div class="text-center contact-info">
                                    <button class="btn btn-contact" onclick="makePayment(<?php echo $user['user_id']; ?>);">See Our Contact Info...</button>
                                    <!--<input type="hidden" custom="Hidden Element" name="hidden">-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    </body>
</html>