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
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php if (count($user) > 0) { ?>
                            <?php foreach ($user as $row) { ?>
                                <div class="member-detail">
                                    <div class="m-b-10">
                                        <strong class="m-b-10">ID: <?php echo $row['user_id']; ?></strong>
                                    </div>
                                    <div class="member-section">
                                        <div class="member-img">
                                            <img src='<?php echo BASE_URL . $row['image_path']; ?>' alt='' />
                                        </div>
                                        <div class="member-info">
                                            <table>
                                                <tr>
                                                    <th>Name</th>
                                                    <td> : </td>
                                                    <td> <?php echo $row['name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Age</th>
                                                    <td> : </td>
                                                    <td> <?php echo $row['age']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Height</th>
                                                    <td> : </td>
                                                    <td> <?php echo $row['height']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td> : </td>
                                                    <td> <?php echo $row['weight']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Education</th>
                                                    <td> : </td>
                                                    <td> <?php echo $row['education']; ?></td>
                                                </tr>
                                            </table>
                                            <a href='user-profile?lan=<?php echo $row['user_id']; ?>' class="btn profile-btn">View Full Profile</a>
                                        </div>
                                    </div>
                                    <div class="member-content-footer">
                                        <p><strong>About :</strong> <?php echo $row['aboutme']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="text-center">
                                <h4>No Member's</h4>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <div class="side-box">
                            <div class="side-header">
                                <h3>BY Region</h3>
                            </div>
                            <div class="side-content">
                                <ul>
                                    <li>Region 1</li>
                                    <li>Region 2</li>
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