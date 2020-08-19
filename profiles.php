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
        <div class="sub-banner-section"></div>
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <?php if (count($user) > 0) { ?>
                                <?php foreach ($user as $row) { ?>
                                    <div class="col-md-6">
                                        <div class="member-detail">
                                            <!--                                            <div class="m-b-10">
                                                                                            <strong class="m-b-10">ID: </strong>
                                                                                        </div>-->
                                            <div class="member-section">
                                                <div class="member-img">
                                                    <img src='<?php echo BASE_URL . $row['image_path']; ?>' alt='' />
                                                </div>
                                                <div class="member-info">
                                                    <strong><h4><?php echo $row['name']; ?> - Id: <?php echo $row['user_id']; ?></h4></strong>
                                                    <p><?php echo $row['age']; ?> Years / <?php echo $row['height']; ?></p>
                                                    <p>About : <?php echo $row['aboutme']; ?></p>
                                                </div>
                                            </div>
                                            <!--                                            <div class="member-content-footer">
                                                                                            
                                                                                        </div>-->

                                            <a href='user-profile.php?uid=<?php echo $row['user_id']; ?>' class="btn profile-btn">View Full Profile</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="text-center">
                                    <h4>No Member's</h4>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="side-box">
                            <div class="side-header">
                                <h3>INIYAA MATRIMONY</h3>
                            </div>
                            <div class="side-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <ul>
                                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Region 1</li>
                                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Region 2</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>