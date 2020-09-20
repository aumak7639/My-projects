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
        <section class="member-profile-section">
            <div class="container">
                <div class="profile-header">
                    <div class="profile-img">
                        <img src="<?php echo BASE_URL . $myprofile['image_path']; ?>" width="200" alt="Profile Image">
                    </div>
                    <div class="profile-nav-info">
                        <h3 class="user-name"><?php echo $myprofile['name']; ?></h3>
                        <div class="address">
                            <p id="state" class="state"><?php echo $myprofile['address']; ?></p>
                            <span id="country" class="country"><?php echo $myprofile['location']; ?></span>
                        </div>

                    </div>
                    <div class="profile-option" onclick="window.location = 'edit-account.php'">
                        <div class="notification">
                            <i class="fa fa-pencil"></i>
<!--                            <span class="alert-message">3</span>-->
                        </div>
                    </div>
                </div>
                <div class="main-bd">
                    <div class="left-side">
                        <div class="profile-side">
                            <p class="mobile-no"><i class="fa fa-phone"></i> <?php echo $myprofile['phone_no']; ?></p>
<!--                            <p class="user-mail"><i class="fa fa-envelope"></i> <?php echo $myprofile['email']; ?></p>-->
                            <div class="user-bio">
                                <h3>Bio</h3>
                                <p class="bio">
                                    <?php echo $myprofile['aboutme']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="right-side">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Your Information</a></li>
                            <li><a data-toggle="tab" href="#menu1">Your Pictures</a></li>
                            <!--                            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                                                        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div class="basic-info">
                                    <table>
                                        <tr>
                                            <th>Your Name</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile Number</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['phone_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Age</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['age']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['date_of_birth']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Marital Status</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['marital_status']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Education</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['education']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Occupation</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['occupation']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Income</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['income']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Height</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['height']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['weight']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Religion</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['religian']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Caste</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['caste']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Location</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['location']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>User Name</th>
                                            <th> : </th>
                                            <td><?php echo $myprofile['user_name']; ?></td>
                                        </tr>
                                    </table>
                                    <br/>
                                    <center><button class="btn btn-primary" onclick="window.location = 'change-password.php'">Change Your Password</button></center>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="">
                                    <div class="file-upload">
                                        <!--place upload image/icon first !-->
                                        <p>Change Profile</p>
                                        <!--place input file last !-->
                                        <input type="file" id="profile_picture" name="profile_picture" onchange="attachAccountFile('profile_picture',<?php echo $_SESSION["user_id"]; ?>);" />
                                    </div>
                                </div>
                                <div class="picture-section">
                                    <?php if (isset($myprofile['image_path']) != '') { ?>
                                        <img src="<?php echo BASE_URL . $myprofile['image_path']; ?>" alt="" />
                                    <?php } else { ?>
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    <?php } ?>
                                    <?php if (isset($myprofile['image_path_1']) != '') { ?>
                                        <img src="<?php echo BASE_URL . $myprofile['image_path_1']; ?>" alt="" />
                                    <?php } else { ?>
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    <?php } ?>
                                    <?php if (isset($myprofile['image_path_2']) != '') { ?>
                                        <img src="<?php echo BASE_URL . $myprofile['image_path_2']; ?>" alt="" />
                                    <?php } else { ?>
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    <?php } ?>
                                    <?php if (isset($myprofile['image_path_3']) != '') { ?>
                                        <img src="<?php echo BASE_URL . $myprofile['image_path_3']; ?>" alt="" />
                                    <?php } else { ?>
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    <?php } ?>
                                    <img src="img/dummy-profile.jpg"/>
                                </div>
                            </div>
                            <!--                            <div id="menu2" class="tab-pane fade">
                                                            <h3>Menu 2</h3>
                                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                                        </div>
                                                        <div id="menu3" class="tab-pane fade">
                                                            <h3>Menu 3</h3>
                                                            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                        </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
        <script>

        </script>
    </body>
</html>