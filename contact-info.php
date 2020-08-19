<?php
session_start();
if (!isset($_GET['uid'])) {
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
        <div class="contact-info-section">
            <div class="container">
                <div class="contact-info-no">
                    <div class="title-section">
                        <h3>Contact Info</h3>
                    </div>
                    <table>
                        <tr>
                            <th>Contact No</th>
                            <td> : </td>
                            <td><?php echo $user['phone_no']; ?></td>
                        </tr>
                    </table>
                    <br/>
                    <br/>
                    <div>
                        <a href="profiles.php">Back to Other Profiles</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>